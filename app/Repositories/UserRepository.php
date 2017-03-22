<?php

namespace Acacha\TodosBackend\Repositories;

use \Acacha\TodosBackend\Repositories\Contracts\Repository;
use Acacha\TodosBackend\User;

class UserRepository implements Repository
{

    public function find($id, $columns = array('*'))
    {
        return User::findOrFail($id);
    }
}