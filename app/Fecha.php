<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{

	protected $table = 'fechas';
	protected $fillable = ['nombre','fecha','torneo_id'];

    public function torneo()
    {
    	return $this->belongsTo('App\Torneo','torneo_id');
    }
}
