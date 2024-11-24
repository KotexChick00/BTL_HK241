<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 * 
 * @property int $location_id
 * @property bool $is_default
 * @property string $state
 * @property string $city
 * @property string $town
 * @property string $address
 * @property int $user_uid
 * 
 * @property User $user
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Location extends Model
{
	protected $table = 'locations';
	protected $primaryKey = 'location_id';
	public $timestamps = false;

	protected $casts = [
		'is_default' => 'bool',
		'user_uid' => 'int'
	];

	protected $fillable = [
		'is_default',
		'state',
		'city',
		'town',
		'address',
		'user_uid'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_uid');
	}

	public function orders()
	{
		return $this->hasMany(Order::class, 'delivery_location_id');
	}
}
