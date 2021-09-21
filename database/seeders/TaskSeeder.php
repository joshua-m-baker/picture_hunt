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
        $tasks = [
            ["Skeleton"],
            ["A fish"],
            ["The larget 17 you can find"],
        ]; 

        foreach ($tasks as $task) {
            Task::create([
                'description' => $task[0],
            ]);  
        }
    }
}