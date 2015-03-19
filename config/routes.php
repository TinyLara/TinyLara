<?php

use TinyLara\TinyRouter\TinyRouter as Route;

Route::get('/', 'HomeController@home');

Route::any('foo', function() {
  echo "Foo!";
});

Route::dispatch('View@process');