<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$password = bcrypt('admin');
        User::create([
            'name' => 'Superadmin',
            'role' => 0,
            'email' => 'admin@admin.com',
            'password' => $password,
        ]);
    }
}
