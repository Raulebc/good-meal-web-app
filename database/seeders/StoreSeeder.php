<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $jhon = DB::table('users')->where('email', 'user.john@email.com')->first() 
            ?? DB::table('users')->first();

        DB::table('stores')->insert([
            'owner_id' => $jhon->id,
            'name' => 'John Doe Store',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
            'email' => 'store@email.com',
            'address' => '1234 Main St',
            'website' => 'https://www.website.cl',
            'phone' => '9 1234 5678',
        ]);

        DB::table('stores')->insert(
            [
                'owner_id' => $jhon->id,
                'name' => 'John Doe Store 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'store@eamil.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
        ]);
    }
}
