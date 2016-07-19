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

class AdminCategoriesController extends Controller
{
		public function index()
		{
				return view( 'lacccategory::index' );
		}
}