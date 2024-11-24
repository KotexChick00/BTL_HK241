<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LegitAttribute
 * 
 * @property int $attribute_id
 * @property bool $is_legit
 * 
 * @property ProductVariantAttribute $product_variant_attribute
 *
 * @package App\Models
 */
class LegitAttribute extends Model
{
	protected $table = 'legit_attributes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'attribute_id' => 'int',
		'is_legit' => 'bool'
	];

	public function product_variant_attribute()
	{
		return $this->belongsTo(ProductVariantAttribute::class, 'attribute_id');
	}
}
