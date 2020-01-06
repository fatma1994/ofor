<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
	protected $guarded=[];
     public function Classes(){
    	return $this->hasMany("App\Classe");} 
    	public function Eleves(){
    	return $this->hasMany("App\Eleve");}
}
