<?php

namespace System\Request;

use System\Request\Traits\HasFileValidationRules;
use System\Request\Traits\HasRunValidationRules;
use System\Request\Traits\HasValidationRules;

class Request
{
  use HasRunValidationRules, HasFileValidationRules, HasValidationRules;
  
  protected $errorExist = false;
  protected $request;
  protected $files = null;
  protected $errorVariableName = [];
  
  public function __construct()
  {
    if (isset($_POST)) {
      $this->postAttributes();
    }
    
    if (!empty($_FILES)) {
      $this->files = $_FILES;
    }
    
  }
  
  protected function postAttributes()
  {
    foreach ($_POST as $key => $value) {
      $this->$key = htmlentities($value);
      $this->request[$key] = htmlentities($value);
      
    }
  }
  
  protected function file($name)
  {
    return isset($this->files[$name]) ? $this->files[$name] : false;
  }
  
  public function all()
  {
    return $this->request;
  }
}
