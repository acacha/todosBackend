<?php

namespace Acacha\TodosBackend\Policies;

use Acacha\TodosBackend\User;
use Acacha\TodosBackend\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class TaskPolicy.
 *
 * @package Acacha\TodosBackend\Policies
 */
class TaskPolicy extends BasePolicy
{
    use HandlesAuthorization,HasAdmin;

    protected function model()
    {
        return 'task';
    }
}
