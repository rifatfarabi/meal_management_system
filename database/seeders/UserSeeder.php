<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            'id' => '1',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('password'),
        ];

        User::create($users);

    }
}
