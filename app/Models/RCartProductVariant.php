<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RCartProductVariant
 * 
 * @property int $variant_id
 * @property int $product_id
 * @property int $cart_id
 * @property int $buyer_uid
 * @property int $quantity
 * 
 * @property ProductVariant $product_variant
 * @property ShoppingCart $shopping_cart
 *
 * @package App\Models
 */
class RCartProductVariant extends Model
{
	protected $table = 'r_cart_product_variant';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'variant_id' => 'int',
		'product_id' => 'int',
		'cart_id' => 'int',
		'buyer_uid' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'cart_id',
		'buyer_uid',
		'quantity'
	];

	public function product_variant()
	{
		return $this->belongsTo(ProductVariant::class, 'variant_id')
					->where('product_variants.variant_id', '=', 'r_cart_product_variant.variant_id')
					->where('product_variants.product_id', '=', 'r_cart_product_variant.product_id');
	}

	public function shopping_cart()
	{
		return $this->belongsTo(ShoppingCart::class, 'cart_id')
					->where('shopping_carts.cart_id', '=', 'r_cart_product_variant.cart_id')
					->where('shopping_carts.buyer_uid', '=', 'r_cart_product_variant.buyer_uid');
	}
}
