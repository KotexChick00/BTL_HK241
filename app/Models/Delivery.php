<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Delivery
 * 
 * @property int $delivery_id
 * @property int $delivered_order_id
 * @property float $delivery_fee
 * @property string $delivery_status
 * @property Carbon $estimated_arrive_time
 * @property int $delivery_person_id
 * 
 * @property DeliveryPartner $delivery_partner
 * @property Order $order
 *
 * @package App\Models
 */
class Delivery extends Model
{
	protected $table = 'delivery';
	public $timestamps = false;

	protected $casts = [
		'delivered_order_id' => 'int',
		'delivery_fee' => 'float',
		'estimated_arrive_time' => 'datetime',
		'delivery_person_id' => 'int'
	];

	protected $fillable = [
		'delivery_fee',
		'delivery_status',
		'estimated_arrive_time',
		'delivery_person_id'
	];

	public function delivery_partner()
	{
		return $this->belongsTo(DeliveryPartner::class, 'delivery_person_id');
	}

	public function order()
	{
		return $this->belongsTo(Order::class, 'delivered_order_id');
	}
}
