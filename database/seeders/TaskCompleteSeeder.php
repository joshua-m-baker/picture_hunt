<?php

namespace Database\Seeders;

use App\Models\TaskComplete;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskCompleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taskIds = DB::table('tasks')->pluck('id');
        $userIds = DB::table('users')->pluck('id');

        foreach ($userIds as $userId) {
            foreach ($taskIds as $taskId) {
                TaskComplete::create([
                    "user_id" => $userId,
                    "task_id" => $taskId,
                ]);  
            }
        }
    }
}
