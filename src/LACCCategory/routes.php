<?php
Route::group( [ 'prefix' => 'admin/categories', 'as' => 'admin.categories.', 'namespace' => 'LACCPress\LACCCategory\Controllers', 'middleware' => [ 'web' ] ], function () {
		Route::get( '/', [ 'uses' => 'AdminCategoriesController@index', 'as' => 'index' ] );
		Route::get( '/create', [ 'uses' => 'AdminCategoriesController@create', 'as' => 'create' ] );
		Route::post( '/store', [ 'uses' => 'AdminCategoriesController@store', 'as' => 'store' ] );
		Route::get( '/edit/{id}', [ 'uses' => 'AdminCategoriesController@edit', 'as' => 'edit' ] );
		Route::put( '/update/{id}', [ 'uses' => 'AdminCategoriesController@update', 'as' => 'update' ] );
		Route::get( '/destroy/{id}', [ 'uses' => 'AdminCategoriesController@destroy', 'as' => 'destroy' ] );
} );