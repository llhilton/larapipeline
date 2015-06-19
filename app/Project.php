<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $guarded=[];

	public function countries(){
        return $this->belongsToMany('App\Country');
    }

    public function funding_sources(){
        return $this->belongsToMany('App\FundingSource')->withPivot('amount');
    }

    public function short_award_numbers(){
        return $this->hasMany('App\ShortAwardNumber');
    }

}