<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Seed users.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => env('ADMIN_USER_NAME'),
            'email' => env('ADMIN_USER_EMAIL'),
            'password' => env('ADMIN_USER_PASSWORD'),
        ]);
    }
}
