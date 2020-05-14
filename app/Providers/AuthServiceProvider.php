<?php

namespace App\Providers;

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

//        Gate::define('employee_add', 'EmployeeController@EmpAddDep');
//        Gate::define('access-admin', function ($user) {
//            return $user->isAdmin;

            /*return false;
            $admin = false;
            foreach ($this->roles as $role)
            {
                if ($role->id == 1){
                    $admin = true;
                }
            }
            return $admin;*/
//        });
    }
}
