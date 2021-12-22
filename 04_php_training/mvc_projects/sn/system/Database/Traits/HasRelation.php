<?php

namespace System\Database\Traits;

use System\Database\Traits\HasQueryBuilder;

trait HasRelation
{
  use HasQueryBuilder;
  protected function hasOne($model, $foreignKey, $localKey)
  {
    if ($this->{$this->primaryKey}) {
      $modelObject = new $model;
      return $modelObject->getHasOneRelation($this->table, $foreignKey, $localKey, $this->$localKey);
    }
  }
  
  protected function getHasOneRelation($table, $foreignKey, $otherKey, $otherKeyValue)
  {
    // sql = 'SELECT phones.* FROM users JOIN on user.id = phone.user_id'
    $this->setSql("SELECT `b`.* FROM {$table} AS `a` JOIN {$this->getTableName()} AS `b` ON `a`.`{$otherKey}` = `b`.`{$foreignKey}` ");
    $this->setWhere('AND', "`a`.`{$otherKey}` = ? ");
    $this->table = 'b';
    $this->addValue($otherKey, $otherKeyValue);
    
    $statement = $this->executeQuery();
    $data = $statement->fetch();
    if ($data) {
      return $this->arrayToAttributes($data);
    }
    return null;
    
  }
  
}
