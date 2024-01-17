<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClearTasksSeeder extends Seeder
{

    public function run()
    {
        DB::table('tasks_list')->truncate();
    }
}
