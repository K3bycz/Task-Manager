<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TaskModel extends Model
{
    protected $table = 'tasks_list';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'category',
        'status',
        'deadline',
        'priority',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
