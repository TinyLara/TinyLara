<?php
use Illuminate\Database\Capsule\Manager as Capsule;

// BASE_PATH
define('BASE_PATH', __DIR__);

// VIEW_BASE_PATH
define('VIEW_BASE_PATH', BASE_PATH.'/app/views/');

// Autoload
require BASE_PATH.'/vendor/autoload.php';

// Log
if (!is_dir(BASE_PATH.'/logs/')) {
  mkdir(BASE_PATH.'/logs/', 0700);
}
$monolog = new \Monolog\Logger('system');
$monolog->pushHandler(new \Monolog\Handler\StreamHandler(BASE_PATH.'/logs/app.log', \Monolog\Logger::ERROR));

// whoops: php errors for cool kids
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->pushHandler(new \Whoops\Handler\PlainTextHandler($monolog));
$whoops->register();

// BASE_URL
$config = require BASE_PATH.'/config/config.php';
define('BASE_URL', $config['base_url']);

// TIME_ZONE
date_default_timezone_set($config['time_zone']);

// Eloquent ORM
$capsule = new Capsule;
$capsule->addConnection(require BASE_PATH.'/config/database.php');
$capsule->bootEloquent();

// View Loader
class_alias('\TinyLara\View\View','View');