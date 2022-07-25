<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository {

    protected $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $attributes){
        return $this->user->create($attributes);
    }

    public function findByEmail($email)
    {
        return $this->user->where('email',$email)->first();
    }

    public function update($email,array $password){
        $user = $this->user->where('email',$email)->first();
        return $user->update($password);
    }


}