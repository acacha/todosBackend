<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class TasksApiTest.
 */
class TasksApiTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * RESOURCE URL ON API.
     *
     * @var string
     */
    protected $uri = '/api/v1/tasks';

    /**
     * Default number of tasks created in database.
     */
    const DEFAULT_NUMBER_OF_TASKS = 5;

    public static function setUpBeforeClass()
    {
        passthru('php artisan passport:install');
    }

    /**
     * Seed database with tasks.
     *
     * @param int $numberOfTasks to create
     */
    protected function seedDatabaseWithTasks($numberOfTasks = self::DEFAULT_NUMBER_OF_TASKS)
    {
        factory(App\Task::class, $numberOfTasks)->create();
    }

    /**
     * Create task.
     *
     * @return mixed
     */
    protected function createTask()
    {
        return factory(App\Task::class)->make();
    }

    /**
     * Convert task to array.
     *
     * @param $task
     *
     * @return array
     */
    protected function convertTaskToArray(Model $task)
    {
        //        return $task->toArray();
        return [
            'name'     => $task->name,
            'done'     => $task->done,
            'priority' => $task->priority,
        ];
    }

    /**
     * Create and persist task on database.
     *
     * @return mixed
     */
    protected function createAndPersistTask()
    {
        return factory(App\Task::class)->create();
    }

    public function userNotAuthenticated() {
        $response = $this->json('GET', $this->uri)->getResult();
        $this->assertEquals(401, $response->status());
        //TODO: test message error
    }
    //NOT AUTHORIZED: $this->assertEquals(403, $response->status());

    protected function login()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user,'api');
    }
    /**
     * Test Retrieve all tasks.
     *
     * @group pepe
     *
     * @return void
     */
    public function testRetrieveAllTasks()
    {
        //Seed database
        $this->seedDatabaseWithTasks();
        $this->login();
        $this->json('GET', $this->uri)
            ->seeJsonStructure([
                '*' => [
                    'id', 'name', 'done', 'priority',
                ],
            ])
            ->assertEquals(
                self::DEFAULT_NUMBER_OF_TASKS,
                count($this->decodeResponseJson())
            );
    }

    /**
     * Test Retrieve one task.
     *
     * @return void
     */
    public function testRetrieveOneTask()
    {
        //Create task in database
        $task = $this->createAndPersistTask();

        $this->json('GET', $this->uri.$task->id)
            ->seeJsonStructure(
                ['id', 'name', 'done', 'priority', 'created_at', 'updated_at'])
//TODO  Needs Transformers to work: convert string to booelan and string to integer
            ->seeJsonContains([
                'name'       => $task->name,
                'done'       => $task->done,
                'priority'   => $task->priority,
                'created_at' => $task->created_at,
                'updated_at' => $task->updated_at,
            ]);
    }

    /**
     * Test Create new task.
     *
     * @return void
     */
    public function testCreateNewTask()
    {
        $task = $this->createTask();
        $this->json('POST', $this->uri, $atask = $this->convertTaskToArray($task))
            ->seeJson([
                'created' => true,
            ])
            ->seeInDatabase('tasks', $atask);
    }

    /**
     * Test update existing task.
     *
     * @return void
     */
    public function testUpdateExistingTask()
    {
        $task = $this->createAndPersistTask();
        $task->done = !$task->done;
        $task->name = 'New task name';
        $this->json('PUT', $this->uri.'/'.$task->id, $atask = $this->convertTaskToArray($task))
            ->seeJson([
                'updated' => true,
            ])
            ->seeInDatabase('tasks', $atask);
    }

    /**
     * Test delete existing task.
     *
     * @return void
     */
    public function testDeleteExistingTask()
    {
        $task = $this->createAndPersistTask();
        $this->json('DELETE', $this->uri.'/'.$task->id, $atask = $this->convertTaskToArray($task))
            ->seeJson([
                'deleted' => true,
            ])
            ->notSeeInDatabase('tasks', $atask);
    }

    /**
     * Test not exists.
     *
     * @param $http_method
     */
    protected function testNotExists($http_method)
    {
        $this->json($http_method, $this->uri.'/99999999')
            ->seeJson([
                'status' => 404,
            ])
            ->assertEquals(404, $this->response->status());
    }

    /**
     * Test get not existing task.
     *
     * @return void
     */
    public function testGetNotExistingTask()
    {
        $this->testNotExists('GET');
    }

    /**
     * Test delete not existing task.
     *
     * @return void
     */
    public function testUpdateNotExistingTask()
    {
        $this->testNotExists('PUT');
    }

    /**
     * Test delete not existing task.
     *
     * @return void
     */
    public function testDeleteNotExistingTask()
    {
        $this->testNotExists('DELETE');
    }

    /**
     * Test pagination.
     *
     * @return void
     */
    public function testPagination()
    {
        //TODO
    }

    //TODO: Test validation

    /**
     * Test name is required and done is set to false and priority to 1.
     *
     * @return void
     */
    public function testNameIsRequiredAndDefaultValues()
    {
        //TODO
    }

    /**
     * Test priority has to be an integer.
     *
     * @return void
     */
    public function testPriorityHaveToBeAnInteger()
    {
        //TODO
    }

    /**
     * Test done has to be a boolean.
     *
     * @return void
     */
    public function testDoneHaveToBeBoolean()
    {
        //TODO


    }
}


