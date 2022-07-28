<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_fee extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id','apartment_room_id', 'tenant_id','total_price','total_paid','water_number','electricity_number','charge_date'
    ];
    protected $primaryKey = 'id';
    protected $table = 'room_fee';

    public function tenant(){
        return $this->belongsTo('App\Models\Tenant','tenant_id');
    }
    public function apartmentroom(){
        return $this->belongsTo('App\Models\Apartmentroom','apartment_room_id');
    }
}
