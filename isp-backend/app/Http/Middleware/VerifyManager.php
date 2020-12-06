<?php


namespace App\Http\Middleware;

use App\Models\Manager;
use Closure;

class VerifyManager
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
        if (!($request->user() instanceof Manager)) {
            abort(403);
        }

        return $next($request);
    }
}
