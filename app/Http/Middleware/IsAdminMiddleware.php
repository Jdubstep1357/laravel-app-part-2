<?php
// Look at Kernal.php for where middleware is at

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\Kernel as HttpKernal;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Http\Response\Illuminate\Http\RedirectResponse
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // Middleware like airposrt security, does not allow in unless requirements are met
    public function handle(Request $request, Closure $next): Response
    {
        // If our user is NOT Admin
        if(!auth()->user()->is_admin) {
            // aborts if error
            abort(code: 403);
    }
        return $next($request);
    }
}
