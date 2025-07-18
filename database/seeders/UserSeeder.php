<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name'=>'Ali Samir',
        //     'email'=>'ali@gmail.com',
        //     'password'=>Hash::make('password'),
        //     'phone_number'=>'050223344',
        // ]);
        // User::create([
        //     'name'=>'Marwa ali',
        //     'email'=>'marwa@gmail.com',
        //     'password'=>Hash::make('password'),
        //     'phone_number'=>'050224433',
        // ]);
    }
}
