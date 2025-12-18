<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

    -&gt;withMiddleware(function (Middleware $middleware): void {
        $middleware-&gt;alias([
            &#39;role&#39; =&gt; \Spatie\Permission\Middleware\RoleMiddleware::class,
            &#39;permission&#39; =&gt; \Spatie\Permission\Middleware\PermissionMiddleware::class,
            &#39;role_or_permission&#39; =&gt;
\Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
    })
