<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Middleware\UpdateLastSeen;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->group(base_path('routes/admin.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(function () {
            if (request()->is('admin') || request()->is('admin/*')) {
                return route('admin.admin_login');
            } else {
                return route('login');
            }
        });
        $middleware->redirectUsersTo(function () {

            if (Auth::guard('admin')->check()) {
                return route('admin.dashboard.welcome');
            } else {
                return route('admin.admin_login');
            }
        });
        $middleware->web(append: [UpdateLastSeen::class]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
