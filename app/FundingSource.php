<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FundingSource extends Model {

    protected $guarded=[];

    public function projects(){
        return $this->belongsToMany('App\Project')->withPivot('amount');
    }

}