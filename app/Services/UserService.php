<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }

//    public function registerResponsible(array $dataUser)
//    {
//        $dataUserPassword = data_get($dataUser, 'password');
//        $dataUserPasswordHashed = Hash::make($dataUserPassword);
//        data_set($dataUser, 'password', $dataUserPasswordHashed);
//        data_set($dataUser, 'type', User::TYPE_RESPONSABLE);
//
//        return $this->createFromArray($dataUser);
//    }
//
//    public function registerStudent(User $userResponsible, array $dataUser)
//    {
//        $responsibleStudentService = new ResponsibleStudentService;
//        $responsibleStudent = new ResponsibleStudent;
//
//        $dataUserPassword = data_get($dataUser, 'password');
//        $dataUserPasswordHashed = Hash::make($dataUserPassword);
//        data_set($dataUser, 'password', $dataUserPasswordHashed);
//        data_set($dataUser, 'type', User::TYPE_STUDENT);
//
//        $userStudent = $this->createFromArray($dataUser);
//
//        $responsibleStudentData = [];
//        data_set($responsibleStudentData, 'student_id', $userStudent->id);
//        data_set($responsibleStudentData, 'responsible_id', $userResponsible->id);
//        $responsibleStudent->fill($responsibleStudentData);
//        $responsibleStudentService->create($responsibleStudent);
//
//        return $userStudent;
//    }
//
//    public function findByTypeResponsible()
//    {
//        return $this->repository->findByType(User::TYPE_RESPONSABLE);
//    }
//
//    public function create(User $user)
//    {
//        return $this->repository->create($user);
//    }
//
//    public function createFromArray(array $user)
//    {
//        return $this->repository->createFromArray($user);
//    }
//
//    public function find($id)
//    {
//        return $this->repository->find($id);
//    }
//
//    public function findAll()
//    {
//        return $this->repository->findAll();
//    }
//
//    public function findByType($type)
//    {
//        return $this->repository->findByType($type);
//    }
}
