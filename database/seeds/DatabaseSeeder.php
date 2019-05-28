<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Research;

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

        $password = bcrypt('password');
        User::create([
            'name' => 'Guest',
            'role' => 1,
            'email' => 'guest@guest.com',
            'password' => $password,
        ]);

        Research::create([
            'title' => 'Testing',
            'year' => '2011',
            'abstract' => 'https://www.google.com/search?q=google&oq=google&aqs=chrome..69i57j69i60l3j69i58j69i65.4499j0j7&sourceid=chrome&ie=UTF-8',
            'authors' => 'John Doe, Jane Du',
            'total_downloads' => 0
        ]);
    }
}
