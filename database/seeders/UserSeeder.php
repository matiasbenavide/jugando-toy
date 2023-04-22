<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now  =  Carbon::now();

        DB::table('users')->delete();
        $user = [
            [
                'id' => User::ID_USER_GRIDMAKERS,
                'name' => User::USER_NAME_GRIDMAKERS,
                'created_by' => User::ID_USER_GRIDMAKERS,
                'updated_by' => User::ID_USER_GRIDMAKERS,
                'remember_token' => Str::random(10),
                'password' => '$2y$10$NSIe1RWZXcLZV1fLFwUyl.1CVrDwUtNqwyLrRWCwnzzEfiYzhb0Re',
                'email_verified_at' => $now,
                'email' => 'matias.gridmakers@gmail.com'
            ],
            [
                'id' => User::ID_USER_JUGANDO_TOY,
                'name' => User::USER_NAME_JUGANDO_TOY,
                'created_by' => User::ID_USER_GRIDMAKERS,
                'updated_by' => User::ID_USER_GRIDMAKERS,
                'remember_token' => Str::random(10),
                'password' => '$2y$10$NSIe1RWZXcLZV1fLFwUyl.1CVrDwUtNqwyLrRWCwnzzEfiYzhb0Re',
                'email_verified_at' => $now,
                'email' => 'larayuziuchuk@gmail.com'
            ]
        ];

        DB::table('users')->insert($user);
    }
}
