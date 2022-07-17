<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model {
	//
	protected $table = "citizens";
	protected $fillable = ['first_name', 'father_name', 'grandfather_name', 'last_name', 'id_number'
		, 'governorate', 'city', 'street', 'mobile','mobile2', 'add_byself' , 'email'];

	protected $appends = ['full_name'];

	public function projects() {
		return $this->belongsToMany('App\Project')->withPivot('project_request');
	}
	public function citizen_projects() {
		return $this->hasMany('App\CitizenProjects');
	}

    // results in a "problem", se examples below
    public function citizen_project($project_id) {
        return $this->citizen_projects()->where('project_id','=', $project_id)->first();
    }
	public function forms() {
		return $this->hasMany('App\Form');
	}
	public function form_follow() {
		return $this->hasMany('App\Form_follow');
	}

	public function getFullNameAttribute() {
		return $this->first_name . ' ' . $this->father_name . ' ' . $this->grandfather_name. ' ' . $this->last_name;
	}
}
