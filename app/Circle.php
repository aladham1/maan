<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Circle extends Model
{
    //
    protected $table = "circles";
    protected $fillable =['name'];

    public function account(){
        return $this->hasMany('App\Account');
    }
    public function links()
    {
        return $this->belongsToMany('App\Link');
    }
    public function category()
    {
        return $this->belongsToMany('App\Category','category_circles')->groupBy('category_id');
    }
    public function circle_categories()
    {
        return $this->hasMany('App\CategoryCircles');
    }
}
