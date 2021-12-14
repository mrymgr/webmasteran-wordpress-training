<?php

namespace System\Database\ORM;

use System\Database\Traits\HasAttributes;
use System\Database\Traits\HasCRUD;
use System\Database\Traits\HasMethodCaller;
use System\Database\Traits\HasQueryBuilder;
use System\Database\Traits\HasRelation;
use System\Database\Traits\HasSoftDelete;


abstract class Model {

	use HasAttributes, HasCRUD, HasMethodCaller, HasQueryBuilder, HasRelation /*, HasSoftDelete*/;

	protected $table;
	protected $fillable = [];
	protected $hidden = [];
	protected $casts = [];
	protected $primaryKey = 'id';
	protected $createdAt = 'created_at';
	protected $updatedAt = 'updated_at';
	protected $deletedAt = null;
	protected array $collection = [];
	
	/*
	 * solve collision issue with traits when they have same methods: HasCRUD & HasSoftDelete
	 * https://stackoverflow.com/questions/25064470/collisions-with-other-trait-methods
	 *
	 * */





}