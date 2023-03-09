<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //define admin role
        Gate::define('isAdmin',function($user){
            return $user->role == 'Admin';
        });

        //define manager role
        Gate::define('isManager',function($user){
            return $user->role == 'Manager';
        });

        //define branch Manager role
        Gate::define('isBranchManager',function($user){
            return $user->role == 'Branch Manager';
        });

        //define branch user role
        Gate::define('isEmployee',function($user){
            return $user->role == 'Employee';
        });
    }
}
