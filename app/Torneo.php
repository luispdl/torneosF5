<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $table = 'torneos';
    protected $fillable = ['nombre','inicio','fin','imagen'];

    public function zonas()
    {
    	return $this->hasMany('App\Zona','torneo_id');
    }

    public function fechas()
    {
    	return $this->hasMany('App\Fecha','torneo_id');
    }
}
