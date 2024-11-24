<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RSellerVoucher
 * 
 * @property string $voucher_code
 * @property int $seller_uid
 * @property Carbon $voucher_start_time
 * @property Carbon $voucher_expire_time
 * @property int $global_maximum_use
 * 
 * @property User $user
 * @property Voucher $voucher
 *
 * @package App\Models
 */
class RSellerVoucher extends Model
{
	protected $table = 'r_seller_voucher';
	protected $primaryKey = 'voucher_code';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'seller_uid' => 'int',
		'voucher_start_time' => 'datetime',
		'voucher_expire_time' => 'datetime',
		'global_maximum_use' => 'int'
	];

	protected $fillable = [
		'seller_uid',
		'voucher_start_time',
		'voucher_expire_time',
		'global_maximum_use'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'seller_uid');
	}

	public function voucher()
	{
		return $this->belongsTo(Voucher::class, 'voucher_code');
	}
}
