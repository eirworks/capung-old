<?php

use App\User;
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
        User::truncate();

        // Admin account
        factory(User::class)->create([
            'name' => 'Admin Developer',
            'email' => 'dev@cc.cc',
            'password' => \Illuminate\Support\Facades\Hash::make('dev'),
            'role' => 'admin',
        ]);

        factory(User::class, 5)->create();
    }
}
