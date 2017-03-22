<?php

namespace Acacha\TodosBackend\Policies;

/**
 * Class HasAdmin.
 *
 * @package Acacha\TodosBackend\Policies
 */
trait HasAdmin
{
    public function before($user, $ability)
    {
        if ($user->hasRole('admin')) return true;
    }
}