<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartmentroom extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id','room_number', 'apartment_id','price','tenant_number','room_image','created_at','updated_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'apartment_room';

    public function Apartment(){
        return $this->belongsTo('App\Models\Apartment','apartment_id');
    }
}
