<?php

use SnapShot\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'name' => 'Madhukar M Mallia',
    		'email' => 'madhukar.mec@gmail.com',
    		'password' => Hash::make('password')
    	]);

    	User::create([
    		'name' => 'Manjunath M Mallia',
    		'email' => 'manjunathmallia93@gmail.com',
    		'password' => Hash::make('password')
    	]);
    }
}
