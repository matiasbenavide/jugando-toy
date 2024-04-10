<?php

namespace Database\Seeders\Admin;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            [
                'id' => 1,
                'color' => 'Arcoíris',
                'detail_logo_img' => 'ProductDetailRainbow.svg',
                'created_by' => User::ID_USER_ADMIN,
                'updated_by' => User::ID_USER_ADMIN
            ],
            [
                'id' => 2,
                'color' => 'Sin Pintar',
                'detail_logo_img' => 'ProductDetailWithoutColor.svg',
                'created_by' => User::ID_USER_ADMIN,
                'updated_by' => User::ID_USER_ADMIN
            ],
            [
                'id' => 3,
                'color' => 'Pastel',
                'detail_logo_img' => 'ProductDetailWithMate.svg',
                'created_by' => User::ID_USER_ADMIN,
                'updated_by' => User::ID_USER_ADMIN
            ]
        ];

        DB::table('colors')->insert($colors);
    }
}
