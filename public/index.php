<?php

// PUBLIC_PATH
define('PUBLIC_PATH', __DIR__);

// bootstrap
require PUBLIC_PATH.'/../bootstrap.php';

// Routes and Begin processing
require BASE_PATH.'/config/routes.php';