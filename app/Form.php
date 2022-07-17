<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model {
	//
	protected $table = "forms";
	protected $fillable = ['title', 'type', 'citizen_id', 'project_id', 'sent_type' ,  'response_type'
		, 'category_id','evaluate' ,'evaluate_note','status','is_report','follow_reason_not', 'content', 'datee', 'account_id','required_respond' , 'form_file' , 'form_data'
        ,'show_data','type_of_followup_visit','old_category_id','box_place','number_of_open_box','date_open_box','form_no'
    ,'hide_data','private_contact_option','mobile_private','email_private'];

	public function citizen() {
		return $this->belongsTo('App\Citizen');
	}

	public function user_change_category() {
		return $this->belongsTo('App\User');
	}

	public function user_change_content() {
		return $this->belongsTo('App\Account');
	}

	public function user_recommendations_for_deleting() {
		return $this->belongsTo('App\Account');
	}

	public function user_recommendations_for_follow_reason_not() {
		return $this->belongsTo('App\Account');
	}

	public function user_reprocessing_recommendations() {
		return $this->belongsTo('App\Account');
	}

	public function sent_typee() {
		return $this->hasOne('App\Sent_type', 'id', 'sent_type');
	}

	public function form_type() {
		return $this->hasOne('App\Form_type', 'id', 'type');
	}

	public function form_status() {
		return $this->hasOne('App\Form_status', 'id', 'status');
	}

    public function form_follow() {
        return $this->hasOne('App\Form_follow', 'form_id', 'id');
    }

    public function form_response() {
        return $this->hasOne('App\Form_response','form_id', 'id');
    }

	public function account() {
		return $this->belongsTo('App\Account');
	}

	public function deleted_user() {
        return $this->hasOne('App\User',  'id','deleted_by');

    }

	public function category() {
		return $this->belongsTo('App\Category');
	}

    public function old_category() {
		return $this->belongsTo('App\Category');
	}

	public function project() {
		return $this->belongsTo('App\Project');
	}

	function form_file() {
		return $this->hasOne('App\Form_file', 'form_id');
	}

	public function form_files() {
		return $this->hasMany('App\Form_file', 'form_id');
	}


}
