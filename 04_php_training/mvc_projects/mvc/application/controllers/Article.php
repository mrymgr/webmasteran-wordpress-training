<?php

namespace Application\Controllers;

use Application\Model\Article as ArticleModel;
use Application\Model\Category;

class Article extends Controller {

	/**
	 * View of article page in admin panel
	 */
	public function index() {
		$article  = new ArticleModel();
		$articles = $article->all();

		return $this->view( 'panel.article.index', compact( 'articles' ) );
	}

	/**
	 * View of create page in admin panel
	 */
	public function create() {

		$category   = new Category();
		$categories = $category->all();

		return $this->view( 'panel.article.create', compact( 'categories' ) );
	}

	/**
	 * Insert into article table
	 */
	public function store() {

		/*$test = $_POST;
		return $this->view('panel.article.debug' , compact('test' ));*/
		$article = new ArticleModel();
		$article->insert( $_POST );

		return $this->redirect( 'article' );

	}

	public function show( $id ) {

	}

	/**
	 * View of edit page
	 *
	 * @param $id
	 */
	public function edit( $id ) {
		$category   = new Category();
		$categories = $category->all();

		$ob_article = new ArticleModel();
		$article    = $ob_article->find( $id );

		return $this->view( 'panel.article.edit', compact( 'categories', 'article' ) );
	}

	public function update( $id ) {

		$article = new ArticleModel();
		$article->update( $id, $_POST );

		return $this->redirect( 'article' );
	}

	public function destroy( $id ) {

		$article = new ArticleModel();
		$article->delete( $id );

		return $this->back();
	}
}
