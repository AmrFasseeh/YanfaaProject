<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // if the link called by the user needs authentication, it gets saved in the current session and redirects the user to
            // the signin form to login and then returns the user to the same link that he called earlier
            $request->session()->put('oldUrl', $request->url());
            return route('user.signin');
        }
    }
}
