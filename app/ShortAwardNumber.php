<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortAwardNumber extends Model {

    public $timestamps=false;
    protected $guarded=[];


    public function projects(){
        return $this->belongsTo('App\Project');
    }
}
