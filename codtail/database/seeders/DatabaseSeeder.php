<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create(
            [
                'name' => 'Pauline',
                'nickname' => 'Popo',
                'email' => 'p.virault@epitech.eu',
                'password' => bcrypt('pass'),
            ]);
        \App\Models\User::create(
            [
                'name' => 'Jérôme',
                'nickname' => 'Jj',
                'email' => 'j.araspin@epitech.eu',
                'password' => bcrypt('pass'),
            ]);
        \App\Models\User::create(
            [
                'name' => 'Vincent',
                'nickname' => 'Vins',
                'email' => 'v.crosnier@epitech.eu',
                'password' => bcrypt('pass'),
            ]);
        \App\Models\User::create(
            [
                'name' => 'Andrea',
                'nickname' => 'Andrélita',
                'email' => 'a.rodriguez@epitech.eu',
                'password' => bcrypt('pass'),
            ]);
        \App\Models\User::create(
            [
                'name' => 'Vivian',
                'nickname' => 'Vivi',
                'email' => 'v.izard@epitech.eu',
                'password' => bcrypt('pass'),
            ]); 
    }
}
