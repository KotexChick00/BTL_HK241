<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $category_id
 * @property string $category_name
 * @property string $category_img_url
 * @property string $category_description
 * 
 * @property Collection|CategoryRelation[] $category_relations
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';
	protected $primaryKey = 'category_id';
	public $timestamps = false;

	protected $fillable = [
		'category_name',
		'category_img_url',
		'category_description'
	];

	public function category_relations()
	{
		return $this->hasMany(CategoryRelation::class, 'parent_category_id');
	}

	public function products()
	{
		return $this->hasMany(Product::class, 'belong_to_category_id');
	}
}
