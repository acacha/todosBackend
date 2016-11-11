<?php

namespace App\Transformers;

use App\Exceptions\IncorrectModelException;

class TaskTransformer extends Transformer
{
    public function transform($resource)
    {
        if (!$resource instanceof \App\Task) {
            throw new IncorrectModelException();
        }

        return [
            'name'     => $resource['name'],
            'done'     => (bool) $resource['done'],
            'priority' => (int) $resource['priority'],
        ];
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 77e35ab6dc972761f25ec180c66aba89ba0b8c2c
