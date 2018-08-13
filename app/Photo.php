<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['photo_path','photo_project'];

    protected $primaryKey = 'photo_id';
}
