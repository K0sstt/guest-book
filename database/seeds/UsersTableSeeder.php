<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Db::table('users')->insert([
    		'name' => 'Admin',
    		'password' => bcrypt('admin'),
    		'email' => 'admin@gmail.com',
    		'isAdmin' => 1
    	]);

        factory(User::class, 50)
        ->create();
    }
}
