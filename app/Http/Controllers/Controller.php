<?php

namespace Acacha\TodosBackend\Http\Controllers;

use Acacha\TodosBackend\Transformers\Contracts\Transformer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $transformer;

    /**
     * Controller constructor.
     *
     * @param $transformer
     */
    public function __construct(Transformer $transformer)
    {
        $this->transformer = $transformer;
    }


    protected function transformCollection($resources)
    {
        //Collections: Laravel collections
        return array_map(function ($resource) {
            return $this->transformer->transform($resource);
        }, $resources);
    }

    /**
     * @param $resource
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function generatePaginatedResponse($resources, array $metadata = [])
    {
        $paginationData = $this->generatePaginationData($resources);
        $data = [
            'data' => $this->transformer->transformCollection($resources->items())
        ];

        return Response::json(array_merge($metadata, $paginationData, $data), 200);
    }

    /**
     * @param $resource
     *
     * @return array
     */
    protected function generatePaginationData($resources)
    {
        $paginationData = [
            'total'         => $resources->total(),
            'per_page'      => $resources->perPage(),
            'current_page'  => $resources->currentPage(),
            'last_page'     => $resources->lastPage(),
            'prev_page_url' => $resources->previousPageUrl(),
            'next_page_url' => $resources->nextPageUrl(),
            'from'          => $resources->firstItem(),
            'to'            => $resources->lastItem(),
        ];

        return $paginationData;
    }
}
