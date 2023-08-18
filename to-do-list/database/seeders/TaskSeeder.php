<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\TaskFactory;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run():void
    {

        Task::factory()->count(20)->create();
    }
}
