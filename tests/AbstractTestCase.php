<?php

/**
 * File: AbstractTestCase.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 03/07/16
 * Time: 19:32
 * Project: pacotes_laravel
 * Copyright: 2016
 */

namespace LACCPress\LACCCategory\Tests;

use Orchestra\Testbench\TestCase;

abstract class AbstractTestCase extends TestCase
{
		public function migrate()
		{
				$this->artisan( 'migrate', [
						'--realpath' => realpath( __DIR__ . '/../src/resources/migrations' ) ] );
		}

		/**
		 * @param \Illuminate\Foundation\Application $app
		 *
		 * @return array
		 */
		public function getPackageProviders( $app )
		{
				return [
						\Cviebrock\EloquentSluggable\SluggableServiceProvider::class,
				];
		}

		/**
		 * Define environment setup.
		 *
		 * @param  \Illuminate\Foundation\Application $app
		 *
		 * @return void
		 */
		protected function getEnvironmentSetUp( $app )
		{
				// Setup default database to use sqlite :memory:
				$app[ 'config' ]->set( 'database.default', 'testbench' );
				$app[ 'config' ]->set( 'database.connections.testbench', [
						'driver'   => 'sqlite',
						'database' => ':memory:',
						'prefix'   => '',
				] );
		}
}