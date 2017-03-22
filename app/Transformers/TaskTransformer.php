<?php

namespace Acacha\TodosBackend\Transformers;

use Acacha\TodosBackend\Exceptions\IncorrectModelException;
use Acacha\TodosBackend\Task;

/**
 * Class TaskTransformer.
 *
 * @package Acacha\TodosBackend\Transformers
 */
class TaskTransformer extends Transformer
{
    /**
     * Transform a task.
     *
     * @param $resource
     * @return array
     * @throws IncorrectModelException
     */
    public function transform($resource)
    {
        if (!$resource instanceof Task) {
            throw new IncorrectModelException();
        }

        return [
            'name'     => $resource['name'],
            'done'     => (bool) $resource['done'],
            'priority' => (int) $resource['priority'],
        ];
    }
}
