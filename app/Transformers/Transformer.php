<?php

namespace Acacha\TodosBackend\Transformers;

use \Acacha\TodosBackend\Transformers\Contracts\Transformer as TransformerContract;

abstract class Transformer implements TransformerContract {
    public function transformCollection($resources) {
        return array_map(function($resource) {
            return $this->transform($resource);
        }, $resources);
    }
}