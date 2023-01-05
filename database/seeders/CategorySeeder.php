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
                'name' => 'Leches y quesos',
                'image' => public_path('fake/product/cheese.png'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'snacks',
                'image' => public_path('fake/product/cheese.png'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'groceries',
                'image' => public_path('fake/product/cheese.png'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'cereals',
                'image' => public_path('fake/product/cheese.png'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'beberages',
                'image' => public_path('fake/product/cheese.png'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'coffe',
                'image' => public_path('fake/product/cheese.png'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'canned food',
                'image' => public_path('fake/product/cheese.png'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'cleaning products',
                'image' => public_path('fake/product/cheese.png'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'frozen food',
                'image' => public_path('fake/product/cheese.png'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
            [
                'name' => 'breads',
                'image' => public_path('fake/product/cheese.png'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            ],
        );
    }
}
