<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ROrderProductVariant
 * 
 * @property int $order_id
 * @property int $variant_id
 * @property int $product_id
 * @property int $quantity
 * 
 * @property Order $order
 * @property ProductVariant $product_variant
 *
 * @package App\Models
 */
class ROrderProductVariant extends Model
{
	protected $table = 'r_order_product_variant';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'variant_id' => 'int',
		'product_id' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'quantity'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function product_variant()
	{
		return $this->belongsTo(ProductVariant::class, 'variant_id')
					->where('product_variants.variant_id', '=', 'r_order_product_variant.variant_id')
					->where('product_variants.product_id', '=', 'r_order_product_variant.product_id');
	}
}
