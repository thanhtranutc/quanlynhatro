<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthlycost extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id','name', 
    ];
    protected $primaryKey = 'id';
    protected $table = 'monthly_costs';

}
