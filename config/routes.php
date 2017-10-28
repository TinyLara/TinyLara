<?php

Route::get('/', 'HomeController@home');
Route::get('/', function(){
  echo "<h2>FUCK</h2>";
});

Route::group(['prefix'=>'zhang','namespace'=>'Zhang','middleware'=>'test'],function(){
  Route::group(['prefix'=>'abc'],function(){
    Route::get('test:any',function() {
      echo  'fuck';
    });
  });
  Route::group(['prefix'=>'def','namespace'=>'Test'],function(){
    Route::get('fuck:any','fuck@abc');
  });
});

Route::get('shite','Abc@abc');

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