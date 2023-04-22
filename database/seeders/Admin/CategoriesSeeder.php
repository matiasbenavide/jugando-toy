<?php

use App\Models\User;
use App\Models\Admin\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories = [
            [
                'id' => 1,
                'name' => 'Individuales',
                'created_by' => User::ID_USER_GRIDMAKERS,
                'updated_by' => User::ID_USER_GRIDMAKERS,
            ],
            [
                'id' => 2,
                'name' => 'Combos y Plazas',
                'created_by' => User::ID_USER_GRIDMAKERS,
                'updated_by' => User::ID_USER_GRIDMAKERS,
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
