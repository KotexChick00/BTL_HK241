<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShoppingCart
 * 
 * @property int $cart_id
 * @property int $buyer_uid
 * 
 * @property User $user
 * @property Collection|RCartProductVariant[] $r_cart_product_variants
 *
 * @package App\Models
 */
class ShoppingCart extends Model
{
	protected $table = 'shopping_carts';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cart_id' => 'int',
		'buyer_uid' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'buyer_uid');
	}

	public function r_cart_product_variants()
	{
		return $this->hasMany(RCartProductVariant::class, 'cart_id');
	}
}
