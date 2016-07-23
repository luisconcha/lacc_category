<?php
/**
 * File: AdminCategoriesController.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 18/07/16
 * Time: 22:32
 * Project: lacc_tdd_project
 * Copyright: 2016
 */
namespace LACCPress\LACCCategory\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use LACCPress\LACCCategory\Models\Category;

class AdminCategoriesController extends Controller
{
		private $category;
		private $response;

		public function __construct( ResponseFactory $response, Category $category )
		{
				$this->category = $category;
				$this->response = $response;
		}

		public function index()
		{
				$listCategories = $this->category->all();

				return $this->response->view( 'lacccategory::index', compact( 'listCategories' ) );
		}

		public function create()
		{
				$listCategories = [ '' => '--Selecione uma categoria--' ] + $this->category->lists( 'name', 'id' )->all();

				return view( 'lacccategory::create', compact( 'listCategories' ) );
		}

		public function store( Request $request )
		{
				$this->category->create( $request->all() );

				return redirect()->route( 'admin.categories.index' );
		}

		public function edit( $id )
		{
				$category       = $this->category->find( $id );
				$listCategories = [ '' => '--Selecione uma categoria--' ] + $this->category->lists( 'name', 'id' )->all();

				return $this->response->view( 'lacccategory::edit', compact( 'category', 'listCategories' ) );
		}

		public function update( Request $request, $id )
		{
				$catId = $id;
				$input = $request->all();
				$this->category->find( $catId )->update( $input );

				return redirect()->route( 'admin.categories.index' );
		}

		public function destroy( $id )
		{
				$this->category->find( $id )->delete();

				return redirect()->route( 'admin.categories.index' );
		}

}