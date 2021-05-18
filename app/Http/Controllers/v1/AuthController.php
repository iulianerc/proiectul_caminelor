<?php

namespace App\Http\Controllers\v1;

use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Models\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use LaravelMerax\Avatars\App\Models\Avatar;

class AuthController extends Controller
{
    public function register(AuthRegisterRequest $request): JsonResponse
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $response['token'] = $user->createToken(env('APP_NAME'))->accessToken;
        return ok($response);
    }
/**
 *   @OA\Post(
 *     path="api/v1/login",
 *     tags={"Auth"},
 *     summary="Login",
 *     operationId="Auth",
 *     @OA\RequestBody(
 *     required=true,
 *     description="User credentials",
 *     @OA\JsonContent(
 *       required={"email","password"},
 *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
 *     )),
 *     @OA\Response(
 *       response=200, description="Success",
 *         @OA\JsonContent(
 *           @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9")
 *         )
 *     ),
 *     @OA\Response(
 *       response=401,description="Wrong email or password",
 *         @OA\JsonContent(
 *           @OA\Property(property="message", type="string", example="Unauthenticated."))
 *         )
 *     ),
 */
    public function login(AuthLoginRequest $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $response['token'] = \user()->createToken(env('APP_NAME'))->accessToken;
            $user['id'] = user()->id;
            $user['name'] = user()->name;
            $user['email'] = user()->email;
            $user['avatar'] = $this->getAvatar();
            $user['position'] = user()->position->alias;
            $response['user'] = $user;

            return ok($response);
        }

        throw new AuthenticationException();
    }

    private function getAvatar ()
    {
        $avatar = Avatar::where('user_id', user()->id)->first();
        if ($avatar) {
            $name = $avatar->file->saved_name;
            $url = Storage::url($avatar->folder(). '/' . $name);
            return [
                'name' => $name,
                'url'  => $url
            ];
        }
    }
}
