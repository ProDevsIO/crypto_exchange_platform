<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        User::firstOrCreate(
            ['email' => 'user@cep.com'],
            [
            'name' => 'User Account',
            'phone' => '1234567890', 
            'email' => 'user@cep.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'type'=> 1
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@prodevs.com'],
            [
            'name' => 'Prodevs Admin', 
            'phone' => '111111111',
            'email' => 'admin@prodevs.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'type'=> 0
            ]
        );
    }
}
