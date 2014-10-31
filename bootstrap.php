<?php
use Illuminate\Database\Capsule\Manager as Capsule;

// BASE_PATH
define('BASE_PATH', __DIR__);

// BASE_URL
$config = require BASE_PATH.'/config/config.php';
define('BASE_URL', $config['base_url']);

// TIME_ZONE
date_default_timezone_set($config['time_zone']);

// Autoload
require BASE_PATH.'/vendor/autoload.php';

// Eloquent ORM
$capsule = new Capsule;
$capsule->addConnection(require BASE_PATH.'/config/database.php');
$capsule->bootEloquent();

// whoops: php errors for cool kids
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();