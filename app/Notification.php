<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //

    protected $table = "notifications";
    protected $primaryKey='id';
    protected $fillable =['user_id','receiver_id','title','link','type','read_at'];

    function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    function receiver(){
        return $this->hasOne('App\User','id','receiver_id');
    }
        public function circle(){
        return $this->belongsTo('App\Circle');
    }
}
