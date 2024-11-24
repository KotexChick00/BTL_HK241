<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoucherApplication
 * 
 * @property int $order_id
 * @property string $voucher_code
 * 
 * @property Order $order
 * @property Voucher $voucher
 *
 * @package App\Models
 */
class VoucherApplication extends Model
{
	protected $table = 'voucher_application';
	protected $primaryKey = 'order_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int'
	];

	protected $fillable = [
		'voucher_code'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function voucher()
	{
		return $this->belongsTo(Voucher::class, 'voucher_code');
	}
}
