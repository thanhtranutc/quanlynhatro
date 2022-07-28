<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id','name', 'phone','email','identity_card_number'
    ];
    protected $primaryKey = 'id';
    protected $table = 'tenants';

    public function tenant_contract(){
        return $this->hasMany('App\Models\Tenant_contract', 'id');
    }
}
