<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $product_id
 * @property string $product_name
 * @property int $in_stock
 * @property float $product_price
 * @property int $seller_uid
 * @property int $belong_to_category_id
 * @property string $product_description
 * 
 * @property Category $category
 * @property User $user
 * @property Collection|ProductImage[] $product_images
 * @property Collection|ProductVariantAttribute[] $product_variant_attributes
 * @property Collection|ProductVariant[] $product_variants
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';
	protected $primaryKey = 'product_id';
	public $timestamps = false;

	protected $casts = [
		'in_stock' => 'int',
		'product_price' => 'float',
		'seller_uid' => 'int',
		'belong_to_category_id' => 'int'
	];

	protected $fillable = [
		'product_name',
		'in_stock',
		'product_price',
		'seller_uid',
		'belong_to_category_id',
		'product_description'
	];

	public function category()
	{
		return $this->belongsTo(Category::class, 'belong_to_category_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'seller_uid');
	}

	public function product_images()
	{
		return $this->hasMany(ProductImage::class);
	}

	public function product_variant_attributes()
	{
		return $this->hasMany(ProductVariantAttribute::class);
	}

	public function product_variants()
	{
		return $this->hasMany(ProductVariant::class);
	}
}
