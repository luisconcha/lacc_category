<?php
/**
 * File: CategoryTest.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 03/07/16
 * Time: 19:47
 * Project: pacotes_laravel
 * Copyright: 2016
 */
namespace LACCPress\LACCCategory\Tests\Models;

use Illuminate\Contracts\Validation\Validator;
use LACCPress\LACCCategory\Models\Category;
use LACCPress\LACCCategory\Tests\AbstractTestCase;
use Mockery as m;

class CategoryTest extends AbstractTestCase
{
		public function setUp()
		{
				parent::setUp();
				$this->migrate();
		}

		public function test_inject_validator_in_category_model()
		{
				$category  = new Category();
				$validator = m::mock( Validator::class );
				$category->setValidator( $validator );
				$this->assertEquals( $category->getValidator(), $validator );
		}

		public function test_should_check_if_is_valid_when_it_is()
		{
				$category       = new Category();
				$category->name = 'Category Test';
				$validator      = m::mock( Validator::class );
				$validator->shouldReceive( 'setRules' )->with( [ 'name' => 'required|max:255' ] );
				$validator->shouldReceive( 'setData' )->with( [ 'name' => 'Category Test' ] );
				$validator->shouldReceive( 'fails' )->andReturn( false );
				$category->setValidator( $validator );
				$this->assertTrue( $category->isValid() );
		}

		public function test_check_if_a_category_can_be_persisted()
		{
				$category = Category::create( [ 'name' => 'Category Test', 'active' => true ] );
				$this->assertEquals( 'Category Test', $category->name );
				$category = Category::all()->first();
				$this->assertEquals( 'Category Test', $category->name );
		}

		public function test_check_if_can_assign_parent_to_a_category()
		{
				$parentCategory = Category::create( [ 'name' => 'Parent Test', 'active' => true ] );
				$category       = Category::create( [ 'name' => 'Category Test', 'active' => true ] );
				$category->parent()->associate( $parentCategory )->save();
				$child = $parentCategory->children->first();
				$this->assertEquals( 'Category Test', $child->name );
				$this->assertEquals( 'Parent Test', $category->parent->name );

		}
}