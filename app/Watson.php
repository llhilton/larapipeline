<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Watson extends Model {

    protected $table="watson";
    public $timestamps=false;


    public function countries()
    {
        return $this->belongsToMany('App\Country','short_award_number');
    }

    public function impromptu(){
        return $this->hasMany('App\Impromptu','short_award_number');
    }

    public function impromptuold(){
        return $this->hasMany('App\ImpromptuOld','short_award_number');
    }

   /* public function project(){
        return $this->belongsToMany('App\Project','project_watson','project_id','short_award_number');
    }*/

}
