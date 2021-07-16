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
            'name' => 'Jørn',
            'email' => 'jorn@prikkprikkprikk.no',
            'password' => '$2y$10$f8aeGZAb.MaK0n86SX5VMeX7RRQqG/X8jZ2Wrr223gfa7lQvVFsO2',
        ]);
    }
}
