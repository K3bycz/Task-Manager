<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\TaskModel;
use App\Models\NotesModel;
use App\Models\AchievementsToUserModel;

class DeleteUsersSeeder extends Seeder
{
    public function run()
    {
        AchievementsToUserModel::where('user_id', '!=', 1)->delete();
        TaskModel::where('user_id', '!=', 1)->delete();
        NotesModel::where('user_id', '!=', 1)->delete();
        User::where('id', '!=', 1)->delete();
        
    }
}
