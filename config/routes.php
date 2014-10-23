<?php

use NoahBuscher\Macaw\Macaw;

Macaw::get('', 'HomeController@home');

Macaw::get('foo', function() {
  echo "Foo!";
});

Macaw::$error_callback = function() {
  throw new Exception("404 Not Found");
};

Macaw::dispatch();