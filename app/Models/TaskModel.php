<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
