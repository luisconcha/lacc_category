<?php
/**
 * File: Category.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 03/07/16
 * Time: 19:07
 * Project: pacotes_laravel
 * Copyright: 2016
 */
namespace LACCPress\LACCCategory\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements SluggableInterface
{
		use SluggableTrait;
		protected $table = "laccpress_categories";
		protected $sluggable = [
			'build_from' => 'name',
			'save_to'    => 'slug',
			'unique'     => true,
		];
		protected $fillable = [
			'name',
			'slug',
			'active',
			'parent_id',
		];

		private $validator;

		/**
		 * Categorização de qualquer outro model que exista
		 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
		 */
		public function categorizable()
		{
				return $this->morphTo();
		}

		public function parent()
		{
				return $this->belongsTo( Category::class );
		}

		public function children()
		{
				return $this->hasMany( Category::class, 'parent_id' );
		}

		public function setValidator( Validator $validator )
		{
				$this->validator = $validator;
		}

		public function getValidator()
		{
				return $this->validator;
		}

		public function isValid()
		{
				$validator = $this->validator;
				$validator->setRules( [ 'name' => 'required|max:255' ] );
				$validator->setData( $this->getAttributes() );

				return !$validator->fails();//retorna true se falhou
		}
}