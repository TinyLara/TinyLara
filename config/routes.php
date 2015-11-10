<?php

use TinyLara\Routing\Router as Route;

Route::get('/', 'HomeController@home');

Route::any('foo', function() {
  echo "Foo!";
});

Route::filter(function() {
  return isset($_GET['token']) && $_GET['token'] == 1;
}, function(){
  Route::any('bar', function() {
    echo "Bar!<br>Filter Success!";
  });
});

Route::dispatch('View@process');