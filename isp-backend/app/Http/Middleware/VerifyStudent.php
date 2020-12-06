<?php


namespace App\Http\Middleware;

use App\Models\Student;
use Closure;

class VerifyStudent
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!($request->user() instanceof Student)) {
            abort(403);
        }

        return $next($request);
    }
}
