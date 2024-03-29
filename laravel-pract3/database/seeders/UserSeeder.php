<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'mikhail',
            'password' => bcrypt('123321'),
            'api_token' => Str::random(80),
            'email' => 'miha@gmail.com'
        ]);
    }
}