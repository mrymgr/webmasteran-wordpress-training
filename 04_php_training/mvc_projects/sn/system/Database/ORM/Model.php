<?php

namespace System\Database\ORM;

use System\Database\Traits\HasAttributes;
use System\Database\Traits\HasCRUD;
use System\Database\Traits\HasMethodCaller;
use System\Database\Traits\HasQueryBuilder;
use System\Database\Traits\HasRelation;
use System\Database\Traits\HasSoftDelete;


abstract class Model {

	use HasAttributes, HasCRUD, HasMethodCaller, HasQueryBuilder, HasRelation, HasSoftDelete;


}