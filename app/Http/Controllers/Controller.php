<?php

namespace App\Http\Controllers;

use App\Transformers\Contracts\Transformer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $transformer;

    /**
     * Controller constructor.
     * @param $transformer
     */
    public function __construct(Transformer $transformer)
    {
        $this->transformer = $transformer;
    }


    /**
     * @param $resource
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
     * @return array
     */
    protected function generatePaginationData($resources)
    {
        $paginationData = [
            'total' => $resources->total(),
            'per_page' => $resources->perPage(),
            'current_page' => $resources->currentPage(),
            'last_page' => $resources->lastPage(),
            'next_page_url' => $resources->previousPageUrl(),
            'prev_page_url' => $resources->nextPageUrl()
        ];
        return $paginationData;
    }
}
