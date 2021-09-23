<?php
use Application\Model\Article;
$article_obj = new Article();
var_dump($test);
//var_dump($id);

/*$query = "UPDATE `articles` SET `title` = ? , `cat_id` = ? , `body` = ? , `updated_at` = now() WHERE `id` = ? ;";
var_dump($query);
var_dump(array_merge( array_values( $test ), [ $id ] ));
$article_obj->update( $id, $test );*/
