<?php

namespace App\Transformers;

use App\Exceptions\IncorrectModelException;

class TaskTransformer extends Transformer
{
    public function transform($resource)
    {
        if (! $resource instanceof \App\Task) {
            throw new IncorrectModelException();
        }
        return [
            'name'     => $resource['name'],
            'done'     => (boolean) $resource['done'],
            'priority' => (integer) $resource['priority'],
        ];
    }
}