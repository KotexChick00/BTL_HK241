<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductVariantAttribute
 * 
 * @property int $attribute_id
 * @property int $product_id
 * @property string $attribute_name
 * 
 * @property Product $product
 * @property Collection|LegitAttribute[] $legit_attributes
 * @property Collection|RPvaPv[] $r_pva_pvs
 *
 * @package App\Models
 */
class ProductVariantAttribute extends Model
{
	protected $table = 'product_variant_attributes';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int'
	];

	protected $fillable = [
		'attribute_name'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function legit_attributes()
	{
		return $this->hasMany(LegitAttribute::class, 'attribute_id');
	}

	public function r_pva_pvs()
	{
		return $this->hasMany(RPvaPv::class, 'attribute_id');
	}
}
