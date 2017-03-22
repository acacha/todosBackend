<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Acacha\TodosBackend\User::class, 50)->create()->each(function ($user) {
            $user->tasks()->saveMany(
                factory(Acacha\TodosBackend\Task::class, 5)->create(['user_id' => $user->id])
            );
        });

//        factory(Acacha\TodosBackend\Task::class,30)->create();
////        $task = factory(Acacha\TodosBackend\Task::class)->make();
////        factory('Acacha\TodosBackend\Task')
    }
}
