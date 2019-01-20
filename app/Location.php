<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{


    protected $guarded = ['id'];

    protected $table = 'locations';
 
    public function equipments(){
        return $this->belongsToMany('App\Equipment','equipment_location','location_id','equipment_id')
        ->withPivot('quantity_good','quantity_bad','quantity_damaged')
    	->withTimestamps();
    }
 






}
