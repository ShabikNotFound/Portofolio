<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. Prepare writable storage directories in /tmp for Vercel serverless environment
$storagePath = sys_get_temp_dir().'/laravel-storage';
$dirs = [
    $storagePath.'/app/private',
    $storagePath.'/app/public',
    $storagePath.'/framework/cache/data',
    $storagePath.'/framework/sessions',
    $storagePath.'/framework/views',
    $storagePath.'/logs',
];

foreach ($dirs as $dir) {
    if (! is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// 2. Ensure SQLite database file exists in temporary directory
$dbPath = sys_get_temp_dir().'/database.sqlite';
if (! file_exists($dbPath)) {
    touch($dbPath);
}

// 3. Register Composer autoloader
require __DIR__.'/../vendor/autoload.php';

// 4. Bootstrap Laravel application
/** @var Application $app */
$app = require __DIR__.'/../bootstrap/app.php';

$app->useStoragePath($storagePath);

// 5. Handle the HTTP request
$app->handleRequest(Request::capture());
