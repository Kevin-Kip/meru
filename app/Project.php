<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name',
            'description',
            'category',
            'constituency',
            'ward',
            'budget',
            'completion',
            'contractor',
            'due_date',
            'added_by'];
}
