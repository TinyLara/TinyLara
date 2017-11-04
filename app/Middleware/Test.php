<?php

namespace App\Middleware;

use Closure;

class Test
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @param  string|null  $guard
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    return $next($request);
  }
}