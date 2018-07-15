<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    protected $fillable = [
      'constituency_name'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
