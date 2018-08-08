<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $primaryKey = "project_id";

    protected $fillable = ['project_name',
            'project_description',
            'project_category',
            'project_constituency',
            'project_ward',
            'budget',
            'completion',
            'contractor',
            'due_date',
            'added_by',
            'project_status',
            'balance'];

    public function photos(){
        return $this->belongsTo(Photo::class,'photo_project','project_id');
    }

    public function constituency(){
        $this->belongsTo(Constituency::class);
    }
}
