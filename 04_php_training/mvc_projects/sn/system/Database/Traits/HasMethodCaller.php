<?php

namespace System\Database\Traits;

trait HasMethodCaller
{
  
  private $allMethods
    = [
      'create', 'update', 'delete', 'find', 'all', 'save', 'where',
      'whereOr', 'whereIn', 'whereNull', 'whereNotNull', 'limit', 'orderBy', 'get', 'paginate'
    ];
  private $allowedMethods
    = [
      'create', 'update', 'delete', 'find', 'all', 'save', 'where',
      'whereOr', 'whereIn', 'whereNull', 'whereNotNull', 'limit', 'orderBy', 'get', 'paginate'
    ];
  
  protected function setAllowMethods($array)
  {
    $this->allowedMethods = $array;
  
  }
}