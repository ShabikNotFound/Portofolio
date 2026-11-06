<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();

// On Vercel serverless, only /tmp is writable — redirect storage path
if (isset($_ENV['VERCEL']) || getenv('VERCEL')) {
    $storage = sys_get_temp_dir().'/laravel-storage';
    foreach ([
        $storage.'/app/private',
        $storage.'/app/public',
        $storage.'/framework/cache/data',
        $storage.'/framework/sessions',
        $storage.'/framework/views',
        $storage.'/logs',
    ] as $dir) {
        if (! is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }
    }
    $app->useStoragePath($storage);
}

return $app;
