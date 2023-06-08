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
        User::create([
            'name' => 'maycol andres',
            'email' => 'maycoltamayo0@gmail.com',
            'password' => bcrypt('a1b2c3d4'),
        ])->assignRole('admin');

        User::factory(9)->create();
    }
}
