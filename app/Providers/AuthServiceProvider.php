<?php

namespace App\Providers;

use App\Role;
use App\Employee;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->defineGates();

    }

    public function defineGates()
    {
        Gate::define('access-admin', function ($user){
            return $user->isAdmin();
        });

        Gate::define('access-hr', function ($user){
            return $user->isHR();
        });

        Gate::define('access-supervisor', function ($user){
            return $user->isSupervisor();
        });

        Gate::define('access-normal', function ($user){
            return $user->isNormalUser();
        });
    }
}
