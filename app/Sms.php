<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    //
    protected $table = "sms";
    protected $fillable =['mobile', 'message_type_id', 'citizen_id','form_id','user_id'];

    public function message_type() {
        return $this->belongsTo('App\MessageType');
    }

    public function user() {
        return $this->belongsTo('App\Account');
    }

    public function user_confirmation() {
        return $this->belongsTo('App\Account');
    }

    public function form() {
        return $this->belongsTo('App\Form');
    }
}
