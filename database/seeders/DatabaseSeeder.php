<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Catigories;
use App\Models\Products;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => "Mohamed",
            'email' => "medo@m.com",
            'email_verified_at' => null,
            "phone" => "01093033115",
            "birth" => fake()->date(), //date("y-m-h", date_create('2003-11-2')),
            "sex" => 1,
            'password' => "123",
        ]);

        User::factory(5)->create();



        $fake_catigories = ["Clothes", "Watches"];

        foreach ( $fake_catigories as $fake_catigory ){
            Catigories::factory()->create([
                "name" => $fake_catigory
            ]);
        }

        Products::factory(5)->create();
        
    }
}
