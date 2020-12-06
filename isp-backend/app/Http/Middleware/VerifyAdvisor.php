<?php


namespace App\Http\Middleware;

use App\Models\Advisor;
use Closure;

class VerifyAdvisor
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
        if (!($request->user() instanceof Advisor)) {
            abort(403);
        }

        return $next($request);
    }
}
