<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    protected $fillable = ['contractor_id','user_id','verified'];

    protected $primaryKey = 'contractor_id';
}
