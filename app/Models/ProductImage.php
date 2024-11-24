<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductImage
 * 
 * @property int $image_id
 * @property int $product_id
 * @property string $image_url
 * 
 * @property Product $product
 *
 * @package App\Models
 */
class ProductImage extends Model
{
	protected $table = 'product_images';
	protected $primaryKey = 'image_id';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int'
	];

	protected $fillable = [
		'product_id',
		'image_url'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
