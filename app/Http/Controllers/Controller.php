<?php

namespace App\Http\Controllers;

use App\Transformers\Contracts\Transformer;
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

<<<<<<< HEAD
=======
    protected function transformCollection($resources)
    {
        //Collections: Laravel collections
        return array_map(function ($resource) {
            return $this->transformer->transform($resource);
        }, $resources);
    }
>>>>>>> 77e35ab6dc972761f25ec180c66aba89ba0b8c2c

    /**
     * @param $resource
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function generatePaginatedResponse($resources, array $metadata = [])
    {
        $paginationData = $this->generatePaginationData($resources);
        $data = [
<<<<<<< HEAD
            'data' => $this->transformer->transformCollection($resources->items())
=======
            'data' => $this->transformCollection($resources->items()),
>>>>>>> 77e35ab6dc972761f25ec180c66aba89ba0b8c2c
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
            'next_page_url' => $resources->previousPageUrl(),
            'prev_page_url' => $resources->nextPageUrl(),
        ];

        return $paginationData;
    }
}
