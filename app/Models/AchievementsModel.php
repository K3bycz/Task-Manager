<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementsModel extends Model
{
    protected $table = 'achievements';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
        'url'
    ];
}
