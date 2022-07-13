<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Usernotnull\Toast\Concerns\WireToast;

class EnsureUserHasRole
{
    use WireToast;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $roleId)
    {

        if (! $request->user()->hasRole($roleId)) {
            // Redirect...
            toast()->warning('Access Denied!','Warning')->pushOnNextPage();
            return redirect()->route('profile.show');
        }

        return $next($request);

    }
}
