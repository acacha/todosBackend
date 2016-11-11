<?php

namespace App\Repositories\Contracts;

interface Repository
{
    public function find($id, $columns = array('*'));

}