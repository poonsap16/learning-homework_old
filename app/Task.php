<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
    	'type_id',
    	'name',
    	'detail',
    	'status',
    ];

    public function getTypeName(){
    	switch($this->type){
    		case 1 :
    			return "Maintenance";
    			break;
    		case 2 :
    			return "Support";
    			break;
    		case 3 :
    			return "RFID";
    			break;
    		case 4 :
    			return "Activity";
    			break;
    		default :
    			return "Unknown";
    			break;
    	}
	}
	
	public function type(){
		return $this->belongsTo(Type::class);
	}
}
