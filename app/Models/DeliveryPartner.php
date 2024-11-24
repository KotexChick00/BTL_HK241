<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DeliveryPartner
 * 
 * @property int $delivery_person_id
 * @property string $delivery_person_phone_number
 * @property string $work_for_company
 * 
 * @property Collection|Delivery[] $deliveries
 *
 * @package App\Models
 */
class DeliveryPartner extends Model
{
	protected $table = 'delivery_partners';
	protected $primaryKey = 'delivery_person_id';
	public $timestamps = false;

	protected $fillable = [
		'delivery_person_phone_number',
		'work_for_company'
	];

	public function deliveries()
	{
		return $this->hasMany(Delivery::class, 'delivery_person_id');
	}
}
