<?php

namespace Database\Seeders;

use App\Models\User;
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

        DB::table('stores')->insert([
                'owner_id' => $jhon->id,
                'name' => 'John Doe Store 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'store@eamil.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
        ]);

        DB::table('stores')->insert([
                'owner_id' => User::factory()->create()->id,
                'name' => 'Bella Vista',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'email_three@email.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
        ]);
        
        DB::table('stores')->insert([
                'owner_id' => User::factory()->create()->id,
                'name' => 'Casa de las Donuts',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'email_three@email.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
        ]);
        
        DB::table('stores')->insert([
                'owner_id' => User::factory()->create()->id,
                'name' => 'San Camilo - Luis ..',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'email_three@email.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
        ]);
        
        DB::table('stores')->insert([
                'owner_id' => User::factory()->create()->id,
                'name' => 'Dunkin - Cenit',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'email_three@email.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
        ]);
        
        DB::table('stores')->insert([
                'owner_id' => User::factory()->create()->id,
                'name' => 'Starbuck - Barros',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'email_three@email.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
        ]);
        
        DB::table('stores')->insert([
                'owner_id' => User::factory()->create()->id,
                'name' => 'Fork Manuel Montt',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'email_three@email.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
        ]);
        
        DB::table('stores')->insert([
                'owner_id' => User::factory()->create()->id,
                'name' => 'Juan Valdéz Café',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'email_three@email.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
        ]);
        
        DB::table('stores')->insert([
                'owner_id' => User::factory()->create()->id,
                'name' => 'Fork Las Lilas',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'email_three@email.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
        ]);
        
        DB::table('stores')->insert([
                'owner_id' => User::factory()->create()->id,
                'name' => 'Melosos',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'email_three@email.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
        ]);
        
        DB::table('stores')->insert([
                'owner_id' => User::factory()->create()->id,
                'name' => 'Lovorno Restaurante',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'email_three@email.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
        ]);
        
        DB::table('stores')->insert([
                'owner_id' => User::factory()->create()->id,
                'name' => 'Madame Grace Nuñoa',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'email_three@email.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
        ]);
    }
}
