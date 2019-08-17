<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

//    public function create(User $user)
//    {
//        return $this->model->create($user->toArray());
//    }
//
//    public function createFromArray(array $user)
//    {
//        return $this->model->create($user);
//    }
//
//    public function find($id)
//    {
//        return $this->model->find($id);
//    }
//
//    public function findAll()
//    {
//        return $this->model->all();
//    }
//
//    public function findByType($type)
//    {
//        return $this->model->where('type', $type)->get();
//    }
}
