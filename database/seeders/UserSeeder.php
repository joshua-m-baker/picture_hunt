<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ["Josh Baker", "joshuabaker97@gmail.com"],
            ["Sara Miskus", "smiskus@gmail.com"],
            ["Marysa Hak", "mhak@gmail.com"],
            ["Henry Orsborn", "horsborn@gmail.com"]
        ]; 

        foreach ($users as $user) {
            User::create(
                [
                'name' => $user[0],
                'email' => $user[1],
                'password' => Hash::make('password'),
            ]);  
        }
    }
}
