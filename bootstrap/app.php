<?php

$app = new TinyLara\Stone\Application(
  realpath(__DIR__.'/../')
);

$app->singleton(
  TinyLara\Contracts\Kernel::class,
  App\Kernel::class
);

return $app;