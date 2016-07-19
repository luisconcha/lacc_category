<?php
/**
 * File: LACCCategoryServiceProvider.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 03/07/16
 * Time: 21:10
 * Project: pacotes_laravel
 * Copyright: 2016
 */
namespace LACCPress\LACCCategory\Providers;

use Illuminate\Support\ServiceProvider;

class LACCCategoryServiceProvider extends ServiceProvider
{
		public function boot()
		{
				$this->publishes( [ __DIR__ . '/../../resources/migrations/' => base_path( 'database/migrations' ) ], 'migrations' );
				$this->loadViewsFrom( __DIR__ . '/../../resources/views/lacccategory', 'lacccategory' );
				require_once __DIR__ . '/../routes.php';
		}

		public function register()
		{
				// TODO: Implement register() method.
		}
}