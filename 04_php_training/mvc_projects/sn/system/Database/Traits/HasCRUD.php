<?php

namespace System\Database\Traits;

use System\Database\DBConnection\DBConnection;
use System\Database\Traits\HasAttributes;
use System\Database\Traits\HasQueryBuilder;

trait HasCRUD
{
  
  use HasAttributes, HasQueryBuilder;
  
  protected function saveMethod()
  {
    
    $fillString = $this->fill();
    //To check what is method: Insert or Update
    if ( ! isset( $this->{$this->primaryKey} ) ) {
      $this->setSql( "INSERT INTO {$this->getTableName()} SET {$fillString} , {$this->getAttributeName($this->createdAt)} = NOW() " );
    } else {
      $this->setSql( "UPDATE  {$this->getTableName()} SET {$fillString} , {$this->getAttributeName($this->updatedAt)} = NOW() " );
      $this->setWhere( "AND", $this->getAttributeName( $this->primaryKey )." = ? " );
      $this->addValue( $this->primaryKey, $this->{$this->primaryKey} );
    }
    
    $this->executeQuery();
    $this->resetQuery();
    
    if ( ! isset( $this->{$this->primaryKey} ) ) {
      $object        = $this->findMethod( DBConnection::newInsertId() );
      $defaultVars   = get_class_vars( get_called_class() );
      $allVars       = get_object_vars( $object );
      $differentVars = array_diff( array_keys( $allVars ), array_keys( $defaultVars ) );
      foreach ( $differentVars as $attribute ) {
        $this->inCastsAttributes( $attribute ) ? $this->registerAttribute( $this, $attribute, $this->castEncodeValue( $attribute, $object->$attribute ) )
          : $this->registerAttribute( $this, $attribute, $object->$attribute );
      }
    }
    $this->resetQuery();
    $this->setAllowMethods( [ 'update', 'delete', 'find' ] );
    
    return $this;
  }
  
  protected function deleteMethod( $id = null )
  {
    $object = $this;
    $this->resetQuery();
    if ( $id ) {
      $object->resetQuery();
    }
    $object->setSql( "DELETE FROM {$object->getTableName()} " );
    $object->setWhere( "AND", $this->getAttributeName( $this->primaryKey )." = ? " );
    $object->addValue( $object->primaryKey, $object->{$object->primaryKey} );
    
    return $object->executeQuery();
  }
  
  protected function allMethod()
  {
    
    $this->setSql( "SELECT * FROM {$this->getTableName()} " );
    $statement = $this->executeQuery();
    $data      = $statement->fetchAll();
    if ( $data ) {
      $this->arrayToObjects( $data );
      
      return $this->collection;
    }
    
    return [];
    
  }
  
  protected function fill()
  {
    
    $fillArray = array();
    //First check if attribute is fillable
    foreach ( $this->fillable as $attribute ) {
      if ( isset( $this->$attribute ) ) {
        //push to $fillArray with back tick form (by getAttributeName method) and (= ?) form
        array_push( $fillArray, $this->getAttributeName( $attribute )." = ? " );
        //now need to check if attribute needs casting or not
        $this->inCastsAttributes( $attribute )
          ? $this->addValue(
          $attribute, $this->castEncodeValue( $attribute, $this->$attribute )
        )
          : $this->addValue( $attribute, $this->$attribute );
      }
    }
    
    $fillString = implode( ', ', $fillArray );
    
    return $fillString;
    
  }
  
  protected function findMethod( $id )
  {
    $this->setSql( "SELECT * FROM {$this->getTableName()} " );
    $this->setWhere( "AND", $this->getAttributeName( $this->primaryKey )." = ? " );
    $this->addValue( $this->primaryKey, $id );
    $statement = $this->executeQuery();
    $data      = $statement->fetch();
    $this->setAllowMethods( [ 'update', 'delete', 'save' ] );
    
    if ( $data ) {
      $this->arrayToAttributes( $data );
    }
    
    return null;
  }
  
  protected function setAllowMethods( array $args )
  {
  
  }
  
}