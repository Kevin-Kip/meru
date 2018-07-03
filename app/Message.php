<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sender_first_name',
        'sender_last_name',
        'email',
        'constituency',
        'message',
    ];
}
