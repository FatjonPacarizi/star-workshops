<?php

namespace App\Providers;

use App\Models\User;
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

        Gate::define('is_admin',function(User $user) {
            if($user->user_status == 'admin')  return true;
           
            return false;
        });
        Gate::define('is_super_admin',function(User $user) {
            if($user->user_status == 'superadmin')   return true;
           
            return false;
        });

        Gate::define('is_admin_or_superadmin',function(User $user) {
            if($user->user_status == 'superadmin' || $user->user_status == 'admin')   return true;

            return false;
        });


    }
}
