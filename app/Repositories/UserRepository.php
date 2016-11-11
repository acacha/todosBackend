<?php

namespace App\Repositories;

use \App\Repositories\Contracts\Repository;
use App\User;

class UserRepository implements Repository
{

    public function find($id, $columns = array('*'))
    {
        return User::findOrFail($id);
    }
}