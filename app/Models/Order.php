<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $order_id
 * @property Carbon $order_time
 * @property float $order_total_price
 * @property string $payment_method
 * @property string $order_status
 * @property int $delivery_location_id
 * @property int $buyer_uid
 * @property int $seller_uid
 * 
 * @property User $user
 * @property Location $location
 * @property Collection|Delivery[] $deliveries
 * @property Collection|ProductVariant[] $product_variants
 * @property VoucherApplication $voucher_application
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'order_id';
	public $timestamps = false;

	protected $casts = [
		'order_time' => 'datetime',
		'order_total_price' => 'float',
		'delivery_location_id' => 'int',
		'buyer_uid' => 'int',
		'seller_uid' => 'int'
	];

	protected $fillable = [
		'order_time',
		'order_total_price',
		'payment_method',
		'order_status',
		'delivery_location_id',
		'buyer_uid',
		'seller_uid'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'seller_uid');
	}

	public function location()
	{
		return $this->belongsTo(Location::class, 'delivery_location_id');
	}

	public function deliveries()
	{
		return $this->hasMany(Delivery::class, 'delivered_order_id');
	}

	public function product_variants()
	{
		return $this->belongsToMany(ProductVariant::class, 'r_order_product_variant', 'order_id', 'variant_id')
					->withPivot('product_id', 'quantity');
	}

	public function voucher_application()
	{
		return $this->hasOne(VoucherApplication::class);
	}
}
