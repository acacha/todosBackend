<?php

namespace Acacha\TodosBackend\Repositories\Contracts;

interface Repository
{
    public function find($id, $columns = array('*'));

}