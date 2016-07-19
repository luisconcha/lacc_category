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

use LACCPress\LACCCategory\Models\Category;
use LACCPress\LACCCategory\Tests\AbstractTestCase;

class CategoryTest extends AbstractTestCase
{
		public function setUp()
		{
				parent::setUp();
				$this->migrate();
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