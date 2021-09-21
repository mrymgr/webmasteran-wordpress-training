<?php

namespace Application\Controllers;

use Application\Model\Category as CategoryModel;

class Category extends Controller {

	/**
	 * View of category page in admin panel
	 */
	public function index() {
		$category   = new CategoryModel();
		$categories = $category->all();

		return $this->view( 'panel.category.index', compact( 'categories' ) );
	}

	/**
	 * View of create page in admin panel
	 */
	public function create() {

		return $this->view( 'panel.category.create' );
	}

	/**
	 * Insert into category table
	 */
	public function store() {

		$category = new CategoryModel();
		$category->insert($_POST);

		return $this->redirect('article');
	}

	public function show( $id ) {

		return $this->view('panel.category.show');
	}

	/**
	 * View of edit page
	 *
	 * @param $id
	 */
	public function edit( $id ) {

		$category_object = new CategoryModel();
		$category = $category_object->find( $id );

		return $this->view( 'panel.category.edit' , compact('category'));
	}

	public function update( $id ) {

		$category = new CategoryModel();
		$category->update( $id , $_POST);

		return $this->redirect('category');

	}

	public function destroy( $id ) {

		$category = new CategoryModel();
		$category->delete($id);

		return $this->back();
	}
}
