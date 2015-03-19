<?php
/**
* \BaseController
*/
class BaseController {

  protected $view;

  public function __construct()
  {
  }

  public function validate($data, $rules)
  {
    return new \TinyLara\TinyValidator\TinyValidator($data, $rules);
  }

  public function __destruct()
  {
  }
}