<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $guarded=[];
    public function Inscription(){
    	return $this->belongsTo("App\Inscription");}
}
