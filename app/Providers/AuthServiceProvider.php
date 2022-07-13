<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        $roles = Role::all();

        foreach($roles[0] as $role)
        {
            Gate::define(1, function (User $user,$role) {

                dd($role[0]);

                return $user->hasRole("$role->id|");
            });

        }

    //     Gate::before(function (User $user, $ability) {
    //         Gate::define($ability, function (User $user) use ($ability) {
    //             return $user->hasPermission($ability);
    //         });
    //   });

    }
}
