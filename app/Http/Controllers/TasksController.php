<?php

namespace Acacha\TodosBackend\Http\Controllers;

use Acacha\TodosBackend\Repositories\TaskRepository;
use Acacha\TodosBackend\Task;
use Acacha\TodosBackend\Transformers\TaskTransformer;
use Auth;
use Gate;
use Illuminate\Http\Request;

/**
 * Class TasksController
 *
 * @package Acacha\TodosBackend\Http\Controllers
 */
class TasksController extends Controller
{
    /**
     * Repository object
     *
     * @var TaskRepository
     */
    protected $repository;

    /**
     * TasksController constructor.
     *
     * @param TaskTransformer $transformer
     * @param TaskRepository $repository
     */
    public function __construct(TaskTransformer $transformer, TaskRepository $repository)
    {
        parent::__construct($transformer);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $user = Auth::user();
//        if ($user->can('show', \Acacha\TodosBackend\Task::class)) {
//            //
//        }

//        $this->authorize('show', \Acacha\TodosBackend\Task::class);

        // The current user can update the post...
        $tasks = Task::paginate(15);
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
        if (!$request->has('user_id')) {
            $request->merge(['user_id' => Auth::id() ]);
        }
        Task::create($request->all());
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
//        $task = Task::findOrFail($id);
        $task = $this->repository->find($id);
        return $this->transformer->transform($task);
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
        $task = Task::findOrFail($id);

        $this->authorize('update', $task);

        //do update here

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
