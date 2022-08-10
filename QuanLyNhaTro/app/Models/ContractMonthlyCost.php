<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractMonthlyCost extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id','tenant_contract_id','monthly_costs_id','pay_type','price' 
    ];
    protected $primaryKey = 'id';
    protected $table = 'contract_monthly_costs';
}
