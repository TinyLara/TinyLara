<?php

use Monolog\Logger, Monolog\Handler\StreamHandler;

/**
* \Log
*/
class Log {

  protected $log;

  function __construct()
  {
    $this->log = new Logger('local');
    $this->log->pushHandler(new StreamHandler(BASE_PATH.'/logs/app.log', Logger::DEBUG));
  }
  private function process($level, $data)
  {
    if ( is_array($data) || is_object($data) ) {
      $data = json_encode($data);
    } else {
      $data = (String) $data;
    }
    $funcName = 'add'.ucfirst($level);
    $this->log->$funcName($data);
  }
  public static function __callStatic($method, $parameters)
  {
    if ( !in_array($method, ['debug', 'info', 'notice', 'warning', 'error', 'critical', 'alert', 'emergency']) ) {
      throw new \UnexpectedValueException("Log level [$method] does not exist!");
    } else {
      $log = new Log;
      $log->process($method, $parameters);
    }
  }
}
