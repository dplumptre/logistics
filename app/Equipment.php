<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
 

    protected $guarded = ['id'];

    protected $table = 'equipments';
 
    public function locations(){
        return $this->belongsToMany('App\Location','equipment_location','equipment_id','location_id')
        ->withPivot('quantity_good','quantity_bad','quantity_damaged')
    	->withTimestamps();
    }




}
