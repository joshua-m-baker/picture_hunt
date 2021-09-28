<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // ["Pigeon"],
        // ["A ridiculous sign"],
        // ["A butterfly"],
        // ["Bird in a tree"],
        // ["Pumpkins (the more the better)"],

        $tasks = [
            ["Fall foliage"],
            ["A cool rock"],
            ["A picture with someone from your car"],
            ["Water"],
            ["Game champion"],
            ["An animal"], 
            ["Delicious food"],
            ["Target"],
            ["Something halloweeny"],
            ["A picture with someone not from your car"], 
            ["Group picture (doesn't have to be the full group)"],
            ["Free Space (anything you want!)"], 
        ]; 

        foreach ($tasks as $task) {
            Task::create([
                'description' => $task[0],
            ]);  
        }
    }
}
