<?php
Route::group( [ 'prefix' => 'admin/categories', 'namespace' => 'LACCPress\LACCCategory\Controllers' ], function () {
		Route::get( '', 'AdminCategoriesController@index' );
} );