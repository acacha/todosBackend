<?php

$factory->define(Acacha\TodosBackend\Task::class, function (Faker\Generator $faker) {
    return [
        'name'     => $faker->sentence,
        'done'     => $faker->boolean,
        'priority' => $faker->randomDigit,
    ];
});
