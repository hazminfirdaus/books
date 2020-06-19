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

        Gate::define('delete_reviews', function($user) {

            //should this user be able to delete reviews?
            return $user->id == 1; // only user with id 1 will return true

        });

        Gate::define('admin', function ($user) {
            // is the user logged in admin?
            return $user->id == 1;
        });
    }
}