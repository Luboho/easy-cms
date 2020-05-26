<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Company;
use App\User;
use App\Policies\ContactCompanyPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Company::class => ContactCompanyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isHeadAdmin', function($user){
            return $user->role == 'head_admin';
        });

        Gate::define('isAdmin', function($user){
            return $user->role == 'head_admin' || $user->role == 'admin';
        });

        Gate::define('isUser', function($user){
            return $user->role == 'user';
        });
    }
}
