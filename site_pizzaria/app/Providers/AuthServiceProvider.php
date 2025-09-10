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
    \App\Models\Customer::class => \App\Policies\CustomerPolicy::class,
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-products', function($user) { return $user->role === 'admin'; });
        Gate::define('manage-customers', function($user) { return $user->role === 'admin'; });
        Gate::define('view-sales', function($user) { return $user->role === 'admin'; }); // ou outro papel
        Gate::define('view-items-on-sale', function($user) {return $user->role === 'admin'; });
        //
    }
}
