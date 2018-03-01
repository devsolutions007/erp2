<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'username' => 'brad',
            'email' => 'admin@admin.com',
            'password' => bcrypt('newyork2306')
        ]);
        $user->assignRole('administrator');

    }
}
