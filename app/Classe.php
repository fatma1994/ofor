<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Classe extends Model

{
	protected $guarded=[];
	
    public function Niveau(){
    	 return $this->belongsTo('App\Niveau');

    }
    public function Serie(){
    	 return $this->belongsTo('App\Serie');

    }
     public function Inscription(){
    	 return $this->belongsTo('App\Inscription');

    }
    public function Cours(){
         return $this->belongsTo('App\Cours');

    }
}
