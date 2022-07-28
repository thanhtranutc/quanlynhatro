<?php

namespace App\Repositories;

use App\Models\Tenant;

class TenantRepository {

    protected $tenant;


    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }
    
    public function findById($id)
    {
        return $this->tenant->find($id);
    }

    public function findByPhone($phone)
    {
        return $this->tenant->where('phone',$phone)->first();
    }

    public function create(array $attributes){
        return $this->tenant->create($attributes);
    }
    


}