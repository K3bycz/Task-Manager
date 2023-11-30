<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\Hello;
use Illuminate\Support\Facades\Auth;
use App\Models\AchievementsToUserModel;
use App\Models\AchievementsModel;

class AchievementsController extends Controller
{
    public function showAchievements()
    {
        $user = Auth::id();
        $achievements = AchievementsToUserModel::where('user_id', $user)
        ->get();
        $data = [];
        foreach ($achievements as $achievement){
            $achievementId = $achievement->achievement_id;
            $data[] = AchievementsModel::find($achievementId);
        }

        return $data;
    }
}
