<?php
/**
 * File: AdminCategoriesControllerTest.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 22/07/16
 * Time: 23:00
 * Project: lacc_tdd_project
 * Copyright: 2016
 */
namespace LACCPress\LACCCategory\Tests\Controllers;

use LACCPress\LACCCategory\Controllers\AdminCategoriesController;
use LACCPress\LACCCategory\Models\Category;
use LACCPress\LACCCategory\Controllers\Controller;
use LACCPress\LACCCategory\Tests\AbstractTestCase;
use Illuminate\Contracts\Routing\ResponseFactory;
use Mockery as m;

class AdminCategoriesControllerTest extends AbstractTestCase
{

		public function test_should_extend_from_controller()
		{
				$category        = m::mock( Category::class );
				$responseFactory = m::mock( ResponseFactory::class );
				$controller      = new AdminCategoriesController( $responseFactory, $category );
				$this->assertInstanceOf( Controller::class, $controller );
		}

		public function test_controller_should_run_index_method_and_return_correct_arguments()
		{
				$category         = m::mock( Category::class );
				$responseFactory  = m::mock( ResponseFactory::class );
				$controller       = new AdminCategoriesController( $responseFactory, $category );
				$html             = m::mock();
				$categoriesResult = [ 'cat1', 'cat2' ];
				$category->shouldReceive( 'all' )->andReturn( $categoriesResult );
				$responseFactory->shouldReceive( 'view' )
					->with( 'lacccategory::index', [ 'listCategories' => $categoriesResult ] )
					->andReturn( $html );
				$this->assertEquals( $controller->index(), $html );
		}

}