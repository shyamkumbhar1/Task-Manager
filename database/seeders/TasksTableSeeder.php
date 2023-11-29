<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Insert sample data into the 'tasks' table
         DB::table('tasks')->insert([
            [
                'title' => 'Task 1',
                'description' => 'Description for Task 1',
                'due_date' => '2023-12-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Task 2',
                'description' => 'Description for Task 2',
                'due_date' => '2023-12-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sample tasks as needed
        ]);
    }
}
