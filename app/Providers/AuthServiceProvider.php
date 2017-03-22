<?php

namespace Acacha\TodosBackend\Providers;

use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Route;

/**
 * Class AuthServiceProvider.
 *
 * @package Acacha\TodosBackend\Providers
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Acacha\TodosBackend\Task' => 'Acacha\TodosBackend\Policies\TaskPolicy',
//        'Acacha\TodosBackend\User' => 'Acacha\TodosBackend\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Route::group(['middleware' => 'cors'], function() {
            Passport::routes();
        });

        Passport::enableImplicitGrant();

        $this->defineGates();
    }

    protected function defineGates()
    {
        Gate::define('gate-name',function() {

        });

        Gate::define('impossible-gate',function() {
            return false; //No autoritzat
        });

        Gate::define('easy-gate',function() {
            return true; //Autoritzat
        });

    }
}
