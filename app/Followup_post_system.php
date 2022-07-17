<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followup_post_system extends Model
{
    protected $table = "followup_post_system";

    protected $fillable =
        [
            'account_id', 'status', 'progress_status', 'datee', 'citizen_project_id',
            'question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7',
            'question2_note', 'question3_note', 'question4_note'
        ];

    public function account(){
        return $this->hasOne('App\Account','id','account_id');
    }

    public function deleted_by() {
        return $this->hasOne('App\Account',  'id','deleted_by');

    }

    public function citizen_project() {
        return $this->hasOne('App\CitizenProjects',  'id','citizen_project_id');
    }



}
