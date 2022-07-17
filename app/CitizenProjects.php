<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CitizenProjects extends Model
{
    //
    protected $table = "citizen_project";
    protected $fillable =['citizen_id','project_id','project_request'];

    public function projects(){
        return $this->belongsTo('App\Project');
    }

    public function citizens(){
        return $this->belongsTo('App\Citizen');
    }
}
