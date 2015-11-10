<?php
/**
* \BaseController
*/
class BaseController {

  public function __construct()
  {
  }

  public function validate($data, $rules)
  {
    return new \TinyLara\Validation\Validator($data, $rules);
  }

  public function __destruct()
  {
  }
}