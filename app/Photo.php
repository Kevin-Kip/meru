<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['photo_path','photo_project'];

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
}
