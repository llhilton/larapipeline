<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    protected $guarded=[];

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }


    public function watson()
    {
        return $this->belongsToMany('App\Watson','short_award_number');
    }
}
