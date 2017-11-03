<?php

// PUBLIC_PATH
define('PUBLIC_PATH', __DIR__);
// BASE_PATH
define('BASE_PATH', dirname(PUBLIC_PATH));
// VIEW_BASE_PATH
define('VIEW_BASE_PATH', BASE_PATH.'/app/views/');

// Autoload
require BASE_PATH.'/vendor/autoload.php';

$app = require_once BASE_PATH.'/bootstrap/app.php';

$kernel = $app->make(TinyLara\Contracts\Kernel::class);

$response = $kernel->handle(
  $app->build(TinyLara\Http\Request::class)
);

$response->send();