<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant_contract extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id','apartment_room_id', 'tenant_id','start_date','end_date','price','water_price','electricity_price','note'
    ];
    protected $primaryKey = 'id';
    protected $table = 'tenant_contracts';

    public function tenant(){
        return $this->belongsTo('App\Models\Tenant','tenant_id');
    }
    public function apartmentroom(){
        return $this->belongsTo('App\Models\Apartmentroom','apartment_room_id');
    }
}
