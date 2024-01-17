<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailModel extends Model
{
    protected $table = 'mails';
    protected $primaryKey = 'id';
    protected $fillable = [
        'recipient',
        'subject',
        'body',
        'sent'
    ];
}
