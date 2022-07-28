<?php

namespace App\Repositories;

use App\Models\Tenant_contract;

class TenantcontractRepository {

    protected $tenant_contract;


    public function __construct(Tenant_contract $tenant_contract)
    {
        $this->tenant_contract = $tenant_contract;
    }
    
    public function getContractByApartmentId($id)
    {
        $contract = $this->tenant_contract->whereMonth('end_date','>',date('m'))
        ->where('apartment_room_id',$id)->first();
        return $contract;
    }

    public function create(array $attributes){
        return $this->tenant_contract->create($attributes);
    }
    


}