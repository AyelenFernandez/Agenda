<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    protected $hierarchy = [
        'admin'  => 3,
        'user' => 2,
        'guest'   => 1
    ];
    

    public function handle($request, Closure $next, $role)
    {
         $user = auth()->user();
        if ($this->hierarchy[$user->role] < $this->hierarchy[$role]) {
            return redirect(url('admin/denegado'));
        }
        return $next($request);
    }
}
