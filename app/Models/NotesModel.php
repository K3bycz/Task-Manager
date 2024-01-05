<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class NotesModel extends Model
{
    protected $table = 'notes_list';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'category',
        'description',
        'user_id',
        'attachments'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
