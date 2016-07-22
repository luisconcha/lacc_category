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

use LACCPress\LACCCategory\Models\Category;

class AdminCategoriesController extends Controller
{
		private $category;

		public function __construct( Category $category )
		{
				$this->category = $category;
		}

		public function index()
		{
				$listCategories = $this->category->all();

				return view( 'lacccategory::index', compact( 'listCategories' ) );
		}

		public function create()
		{
				return view( 'lacccategory::create' );
		}
}