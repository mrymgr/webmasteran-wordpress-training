<?php

namespace Application\Controllers;

use Application\Model\Category;
use Application\Model\Article;

class Home extends Controller {

	public function index() {

		$category_model_obj = new Category();
		$categories = $category_model_obj->all();
		$article_model_obj = new Article();
		$articles = $article_model_obj->all();

		return $this->view('app.index', compact('categories' , 'articles'));
	}

	public function category( $id ) {
		$ob_category = new Category();
		$categories = $ob_category->all();
		$ob_category = new Category();
		$category = $ob_category->find( $id );
		$ob_category = new Category();
		$articles = $ob_category->articles( $id );

		return $this->view( 'app.category', compact('categories', 'category', 'articles'));

	}

	public function show( $id ) {
		$ob_category = new Category();
		$categories = $ob_category->all();
		$ob_article = new Article();
		$article = $ob_article->find( $id );

		return $this->view('app.show', compact('categories', 'article'));
	}
}
