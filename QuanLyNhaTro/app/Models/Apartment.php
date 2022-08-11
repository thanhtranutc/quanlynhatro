<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Apartment extends Model
{
    use HasFactory, LogsActivity;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id','name', 'address','image','user_id','created_at','updated_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'apartment';

    public function Apartmentroom()
    {
        return $this->hasMany('App\Models\Apartmentroom', 'id');
    }

    public function User(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
