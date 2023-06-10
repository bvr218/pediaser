<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson() && auth()->check()) {
            $level = auth()->user()->level;
            if ($level == 0) {
                return '/administrator';
            } elseif ($level == 1) {
                return '/PDV';
            }
        }

        return $request->expectsJson() ? null : route('login');
    }
}
