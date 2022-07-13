<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
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


        //Enable Session in AuthServiceProvider
        Event::listen(
            \Illuminate\Auth\Events\Authenticated::class,
            function () {
              // your code goes here …
                $role_ids = DB::select('select `role_id` from `role_user` where `user_id` = ?', [Auth::user()->id]);
                $role = Role::find($role_ids[0]->role_id);
                //dd($role->name);

                Gate::define($role->name, function (User $user) {

                    $role_ids = DB::select('select `role_id` from `role_user` where `user_id` = ?', [Auth::user()->id]);
                    $role = Role::find($role_ids[0]->role_id);

                    return $user->role($user) == $role->name;
                });

            }
        );

    }
}
