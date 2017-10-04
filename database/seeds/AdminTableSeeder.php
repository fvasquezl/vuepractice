<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => 'Faustino Vasquez',
            'email' => 'fvasquez@local.com',
            'password' => bcrypt('123456'),
            'role' => 'admin'
        ]);
    }
}
