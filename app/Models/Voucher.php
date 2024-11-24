<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Voucher
 * 
 * @property string $voucher_code
 * @property string $voucher_name
 * @property Carbon $voucher_create_time
 * @property Carbon $voucher_expire_time
 * @property float $voucher_discount
 * @property float $voucher_min_requirement
 * @property float $voucher_max_discount
 * 
 * @property RSellerVoucher $r_seller_voucher
 * @property Collection|VoucherApplication[] $voucher_applications
 *
 * @package App\Models
 */
class Voucher extends Model
{
	protected $table = 'vouchers';
	protected $primaryKey = 'voucher_code';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'voucher_create_time' => 'datetime',
		'voucher_expire_time' => 'datetime',
		'voucher_discount' => 'float',
		'voucher_min_requirement' => 'float',
		'voucher_max_discount' => 'float'
	];

	protected $fillable = [
		'voucher_name',
		'voucher_create_time',
		'voucher_expire_time',
		'voucher_discount',
		'voucher_min_requirement',
		'voucher_max_discount'
	];

	public function r_seller_voucher()
	{
		return $this->hasOne(RSellerVoucher::class, 'voucher_code');
	}

	public function voucher_applications()
	{
		return $this->hasMany(VoucherApplication::class, 'voucher_code');
	}
}
