<?php

namespace Acacha\TodosBackend\Repositories;

use \Acacha\TodosBackend\Repositories\Contracts\Repository;
use Acacha\TodosBackend\Task;

class TaskRepository implements Repository
{

    public function find($id, $columns = array('*'))
    {
        return Task::findOrFail($id);
    }
}