<?php

namespace App\Transformers;

use App\Exceptions\IncorrectModelException;
use App\Task;

/**
 * Class TaskTransformer.
 *
 * @package App\Transformers
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
