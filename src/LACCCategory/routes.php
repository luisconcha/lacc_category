<?php
Route::group( [ 'prefix' => 'categories', 'namespace' => 'LACCPress\LACCCategory\Controllers' ], function () {
		Route::get( 'test', 'AdminCategoriesController@index' );
} );