<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if (!$user || !$this->hasRole($user->role, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }

    private function hasRole($userRoleValue, $allowedRoleValues)
    {
        return in_array($userRoleValue, $allowedRoleValues);
    }
}
