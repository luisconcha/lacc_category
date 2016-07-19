<?php

/**
 * File: 2016_07_3_123456_CreateLaccCategoriesTable.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 03/07/16
 * Time: 19:12
 * Project: pacotes_laravel
 * Copyright: 2016
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaccCategoriesTable
{
		public function up()
		{
				Schema::create( 'laccpress_categories', function ( Blueprint $table ) {
						$table->increments( 'id' );
						$table->integer( 'parent_id' )->nullable( true )->unsigned();
						$table->foreign( 'parent_id' )->references( 'id' )->on( 'laccpress_categories' );
						$table->string( 'name' );
						$table->string( 'slug' );
						$table->boolean( 'active' )->default( false );
						$table->timestamps();
				} );
		}

		public function down()
		{
				Schema::drop( 'laccpress_categories' );
		}
}