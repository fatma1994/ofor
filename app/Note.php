<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded=[];
     public function Matieres(){
    	return $this->hasMany("App\matiere");} 
    	public function Eleves(){
    	return $this->hasMany("App\Eleve");}
}
