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
            ["Sara Miskus", "saramiskus@gmail.com"],
            ["Marysa Hak", "marysa.hak@gmail.com"],
            ["Dante Razo", "dante@razonet.org"],
            ["Henry Orsborn", "henryorsborn@gmail.com"],
            ["Meredith Allen", "meredithallen8@gmail.com"],
            ["Rabina Phuyel", "rabinaphuyel@gmail.com"],
            ["Aastha Agarwal", "aastha.agar@gmail.com"],
            ["Luis Loza", "lloza@usc.edu"],
            ["Lena Stenvig", "stenvigl99@gmail.com"],
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
