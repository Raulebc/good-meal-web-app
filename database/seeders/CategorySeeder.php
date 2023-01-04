<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                'name' => 'Category 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'Category 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'Category 3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'Category 4',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'Category 5',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'Category 6',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'Category 7',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'Category 8',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'Category 9',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'Category 10',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
        );
    }
}
