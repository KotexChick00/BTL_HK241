<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RPvaPv
 * 
 * @property int $attribute_id
 * @property int $variant_id
 * @property int $product_id
 * @property string $value
 * 
 * @property ProductVariantAttribute $product_variant_attribute
 * @property ProductVariant $product_variant
 *
 * @package App\Models
 */
class RPvaPv extends Model
{
	protected $table = 'r_pva_pv';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'attribute_id' => 'int',
		'variant_id' => 'int',
		'product_id' => 'int'
	];

	protected $fillable = [
		'value'
	];

	public function product_variant_attribute()
	{
		return $this->belongsTo(ProductVariantAttribute::class, 'attribute_id')
					->where('product_variant_attributes.attribute_id', '=', 'r_pva_pv.attribute_id')
					->where('product_variant_attributes.product_id', '=', 'r_pva_pv.product_id');
	}

	public function product_variant()
	{
		return $this->belongsTo(ProductVariant::class, 'variant_id')
					->where('product_variants.variant_id', '=', 'r_pva_pv.variant_id')
					->where('product_variants.product_id', '=', 'r_pva_pv.product_id');
	}
}
