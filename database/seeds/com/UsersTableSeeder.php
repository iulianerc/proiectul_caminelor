<?php

namespace seeds\com;

use App\Models\Contact\Contact;
use App\Models\Position\Position;
use App\Models\Status\Status;
use App\Models\User\User;
use App\Models\WorkPosition\WorkPosition;
use App\Repositories\User\UserRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    private string $table = 'users';
    private UserRepository $repository;

    public function run (): void
    {
        $this->repository = app(UserRepository::class);
        $this->dump();
    }

    private function users (): array
    {
        return [
            [
                'name'     => 'root',
                'email'    => 'root@domain.com',
                'phones'   => [
                    '+373079787878',
                    '+373067787878'
                ],
                'gender'   => 'm',
                'position' => 'admin',
                'password' => Hash::make('123456789'),
            ],
            [
                'name'     => 'Ichim Valentina',
                'email'    => 'valentina.ichim@chamber.md',
                'phones'   => ['+373069448826'],
                'gender'   => 'f',
                'position' => 'chairman',
                'password' => Hash::make('123456789'),
            ],
            [
                'name'     => 'Calenic Natalia',
                'email'    => 'natalia.calenic@gmail.com',
                'phones'   => ['+373078783002'],
                'gender'   => 'f',
                'position' => 'vice_president',
                'password' => Hash::make('123456789'),
            ],
            [
                'name'     => 'Muntean Vadim',
                'email'    => 'vadim.muntean@chamber.md',
                'phones'   => [
                    '+373022238860',
                    '+373022238783'
                ],
                'gender'   => 'm',
                'position' => 'department_head',
                'password' => Hash::make('123456789'),
            ],
            [
                'name'     => 'Solodchi Doina',
                'email'    => 'doina.solodchi4@gmail.com',
                'phones'   => ['+373069131292'],
                'gender'   => 'f',
                'position' => 'specialist',
                'password' => Hash::make('123456789'),
            ],
            [
                'name'     => 'Colesnic Mariana',
                'email'    => 'marianadeclar@gmail.com',
                'phones'   => ['+373069769229'],
                'gender'   => 'f',
                'position' => 'specialist',
                'password' => Hash::make('123456789'),
            ]
        ];
    }

    private function dump (): void
    {
        $statusId = Status::where(['type' => 'user', 'alias' => 'active'])->first()->id;
        foreach ($this->users() as $user) {
            $positionId = Position::findByAlias($user['position'])->id;

            $userID = DB::table($this->table)->insertGetId([
                'uuid'                => Str::orderedUuid(),
                'name'                => $user['name'],
                'email'               => $user['email'],
                'email_verified_at'   => now(),
                'password'            => $user['password'],
                'remember_token'      => Str::random(10),
                'timezone'            => 'Europe/Chisinau',
                'password_expired'    => false,
                'author_id'           => 1,
                'status_id'           => $statusId,
                'position_id'         => $positionId,
                'is_active'           => true,
                'password_changed_at' => now(),
                'created_at'          => now(),
                'updated_at'          => now(),
            ]);
        }
    }

    public static function permissions (): array
    {
        return array_values(config('permissions.users.modules.users.actions'));
    }

    public function get (array $fields): Collection
    {
        return DB::table($this->table)->get($fields);
    }
}
