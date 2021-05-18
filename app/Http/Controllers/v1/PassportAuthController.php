<?php


namespace App\Http\Controllers\v1;


use App\Http\Requests\BasicRequestInterface;
use App\Http\Requests\User\Guest\GuestRegisterRequest;
use App\Http\Requests\User\Password\MatchOldPassword;
use App\Models\Project\Project;
use App\Models\User\AccountActivate;
use App\Models\User\User;
use App\Notifications\User\AccountActivateRequest;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Passport;
use Psr\Http\Message\ServerRequestInterface;

class PassportAuthController extends AccessTokenController
{

    public function registration(ServerRequestInterface $request, bool $activated = false)
    {
        if (!config('com.auth.registration.enable')) {
            return not_found();
        }

        $parsedBody = $request->getParsedBody();

        $this->validateRegistration($parsedBody, new GuestRegisterRequest());

        $domain = Project::getOriginDomain($request->getServerParams()['HTTP_ORIGIN'] ?? 'localhost');
        $data = app(UserRepository::class)->prepareUserData($parsedBody, $domain, 'guest', $activated);

        $createdUser = app(UserRepository::class)->create($data);
        $createdUser->projects()->attach(Project::get($domain)->id);

        if (!$createdUser->is_active && !$activated) {
            $accountActivate = AccountActivate::updateOrCreate(
                ['email' => $createdUser->email],
                [
                    'email' => $createdUser->email,
                    'token' => Str::random(60)
                ]
            );

            $createdUser->notify(new AccountActivateRequest($accountActivate->token, $createdUser->project));
            return ok(['message' => 'Please verify email, the message has been sent.']);
        }

        if (!config('com.auth.registration.auth_after')) {
            return ok();
        }

        return $this->login($request);
    }

    public function login(ServerRequestInterface $request): JsonResponse
    {
        $parsedBody = $request->getParsedBody();

        $client = $this->getClient($parsedBody['client_name']);

        $parsedBody['username'] = $parsedBody['email'];
        $parsedBody['grant_type'] = 'password';
        $parsedBody['client_id'] = $client->id;
        $parsedBody['client_secret'] = $client->secret;

        // since it is not required by passport
        unset($parsedBody['email'], $parsedBody['client_name']);

        $response = decode($this->issueToken($request->withParsedBody($parsedBody))->getContent());
        $user = app(User::class)->findForPassport($parsedBody['username']);


        $response['user'] = [
            'uuid'     => $user->uuid,
            'name'     => $user->name,
            'avatar'   => $user->avatar_link,
            'position' => $user->position->alias,
        ];
        event( new Login('api', $user, false));
        return ok($response);
    }

    public function activate(string $token)
    {
        $activationToken = AccountActivate::where('token', $token)->first();
        if (!$activationToken) {
            return not_found([
                'message' => 'This account activation token is invalid.'
            ]);
        }

        if (\carbon($activationToken->updated_at)->addMinutes(config('com.auth.account_activate_token_minutes'))->isPast()) {
            $activationToken->delete();

            return not_found([
                'message' => 'This account activation token is expired.'
            ]);
        }

        $user = User::where('email', $activationToken->email)->first();
        $user->is_active = true;
        $user->email_verified_at = now();
        $user->password_changed_at = now();
        $user->save();
        $activationToken->delete();

        return ok();
    }

    public function refresh(ServerRequestInterface $request): Response
    {
        $parsedBody = $request->getParsedBody();

        $client = $this->getClient($parsedBody['client_name']);

        $parsedBody['grant_type'] = 'refresh_token';
        $parsedBody['client_id'] = $client->id;
        $parsedBody['client_secret'] = $client->secret;

        // since it is not required by passport
        unset($parsedBody['client_name']);

        return $this->issueToken($request->withParsedBody($parsedBody));
    }

    public function logout(ServerRequestInterface $request)
    {
        $parsedBody = $request->getParsedBody();
        $client = $this->getClient($parsedBody['client_name']);

        $token = auth()->user()
            ->tokens
            ->where('client_id', $client->id)
            ->first();

        abort_if($token === null, 400, 'Token for the given client name does not exist');

        $token->delete();
        event( new Logout('api', \user()));
        return response()->json('Logged out successfully', 200);
    }

    public function updatePassword(ServerRequestInterface $request): Response
    {
        $parsedBody = $request->getParsedBody();
        validator($parsedBody, [
            'client_name'  => ['required'],
            'old_password' => ['required', new MatchOldPassword],
            'password'     => ['required', 'confirmed'],
        ])->validate();

        $client = $this->getClient($parsedBody['client_name']);
        $parsedBody['username'] = \user()->email;
        $parsedBody['grant_type'] = 'password';
        $parsedBody['client_id'] = $client->id;
        $parsedBody['client_secret'] = $client->secret;


        \user()->password = $parsedBody['password'];
        \user()->password_expired = 0;
        \user()->password_changed_at = now();
        \user()->save();

        // since it is not required by passport
        unset($parsedBody['client_name']);

        return $this->issueToken($request->withParsedBody($parsedBody));
    }

    private function getClient(string $name)
    {
        return Passport::client()
            ->where([
                ['name', $name],
                ['password_client', 1],
                ['revoked', 0]
            ])
            ->first();
    }

    private function validateRegistration(array $data, BasicRequestInterface $request): void
    {
        $request
            ->merge($data)
            ->validate($request->rules());
    }

}
