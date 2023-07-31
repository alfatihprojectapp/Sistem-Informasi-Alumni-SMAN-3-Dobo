<?php

namespace App\Http\Middleware;

use App\Models\TahunPendaftaran;
use Closure;
use Illuminate\Http\Request;

class OpenRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $openRegister = TahunPendaftaran::where('is_actived', 1)->count();

        if ($openRegister < 1) {
            abort(403);
        }

        return $next($request);
    }
}
