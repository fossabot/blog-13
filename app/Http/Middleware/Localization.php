<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Http\Request;
use Session;

/**
 * Class Localization
 * @package App\Http\Middleware
 */
class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setlocale(Session::get('locale'));
        }
        return $next($request);
    }
}
