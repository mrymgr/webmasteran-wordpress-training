<?php

namespace App;

use System\Database\ORM\Model;

class Role extends Model
{
  protected string $table = "roles";
  protected $fillable = ['name'];
  protected $casts = [];
  
}