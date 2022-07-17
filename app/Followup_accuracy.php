<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followup_accuracy extends Model
{
    protected $table = "followup_accuracy";

    protected $fillable =
        [
            'account_id', 'status', 'progress_status', 'datee', 'form_id', 'question1', 'question1_note', 'question2',
            'question2_note', 'question3', 'question3_note', 'question4', 'question4_note', 'question5',
            'question5_note', 'question6', 'question6_note', 'question7', 'question7_note', 'question8', 'question9'
        ];

    public function account(){
        return $this->hasOne('App\Account','id','account_id');
    }

    public function deleted_by() {
        return $this->hasOne('App\Account',  'id','deleted_by');

    }

    public function form() {
        return $this->hasOne('App\Form',  'id','form_id');
    }



}
