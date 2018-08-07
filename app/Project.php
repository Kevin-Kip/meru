<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
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
        return $this->belongsTo(Photo::class,'project_id','photo_project');
    }

    public function constituency(){
        $this->belongsTo(Constituency::class);
    }
}
