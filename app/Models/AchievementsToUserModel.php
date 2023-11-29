<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementsToUserModel extends Model
{
    protected $table = 'achievements_to_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'achievement_id',
        'user_id',
    ];

    public function achievement()
    {
        return $this->belongsTo(AchievementModel::class, 'achievement_id');
    }
}
