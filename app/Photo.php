<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['name','project_name'];

    public function project(){
        return $this->belongsTo('App\Project');
    }
}
