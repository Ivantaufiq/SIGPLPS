<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name'=> 'Van',
            'username' => 'Van',
            'email'=> 'van@gmail.com',
            'password' => bcrypt('12345')
        ]);
    }
}
