<?php

namespace Acacha\TodosBackend\Http\Controllers;

use Acacha\TodosBackend\Transformers\TaskTransformer;
use Acacha\TodosBackend\User;
use Illuminate\Http\Request;

/**
 * Class UserTasksController
 * @package Acacha\TodosBackend\Http\Controllers
 */
class UserTasksController extends Controller
{
    /**
     * TasksController constructor.
     */
    public function __construct(TaskTransformer $transformer)
    {
        parent::__construct($transformer);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);

        $tasks = $user->tasks()->paginate(5);

        return $this->generatePaginatedResponse($tasks, ['propietari' => 'Sergi Tur']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
