<?php

namespace App\Policies;

/**
 * Class HasAdmin.
 *
 * @package App\Policies
 */
trait HasAdmin
{
    public function before($user, $ability)
    {
        if ($user->hasRole('admin')) return true;
    }
}