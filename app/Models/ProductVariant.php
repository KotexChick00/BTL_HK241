<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductVariant
 * 
 * @property int $variant_id
 * @property int $product_id
 * @property string $variant_name
 * @property float $variant_price
 * @property int $variant_quantity
 * @property string $variant_img_url
 * 
 * @property Product $product
 * @property RCartProductVariant $r_cart_product_variant
 * @property Collection|Order[] $orders
 * @property Collection|RPvaPv[] $r_pva_pvs
 *
 * @package App\Models
 */
class ProductVariant extends Model
{
	protected $table = 'product_variants';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'variant_price' => 'float',
		'variant_quantity' => 'int'
	];

	protected $fillable = [
		'variant_name',
		'variant_price',
		'variant_quantity',
		'variant_img_url'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function r_cart_product_variant()
	{
		return $this->hasOne(RCartProductVariant::class, 'variant_id');
	}

	public function orders()
	{
		return $this->belongsToMany(Order::class, 'r_order_product_variant', 'variant_id')
					->withPivot('product_id', 'quantity');
	}

	public function r_pva_pvs()
	{
		return $this->hasMany(RPvaPv::class, 'variant_id');
	}
}
