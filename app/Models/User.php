<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $user_uid
 * @property string $login
 * @property string $password
 * @property bool $user_type
 * @property string $full_name
 * @property string $phone_number
 * @property string|null $shop_name
 * @property string|null $shop_description
 * 
 * @property Collection|BankAccount[] $bank_accounts
 * @property Collection|Location[] $locations
 * @property Collection|Order[] $orders
 * @property Collection|Product[] $products
 * @property Collection|RSellerVoucher[] $r_seller_vouchers
 * @property Collection|ShoppingCart[] $shopping_carts
 *
 * @package App\Models
 */
class User extends Model
{
	use \Illuminate\Database\Eloquent\Factories\HasFactory;
	protected $table = 'users';
	protected $primaryKey = 'user_uid';
	public $timestamps = false;

	protected $casts = [
		'user_type' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'login',
		'password',
		'user_type',
		'full_name',
		'phone_number',
		'shop_name',
		'shop_description'
	];

	public function bank_accounts()
	{
		return $this->hasMany(BankAccount::class, 'holder_uid');
	}

	public function locations()
	{
		return $this->hasMany(Location::class, 'user_uid');
	}

	public function orders()
	{
		return $this->hasMany(Order::class, 'seller_uid');
	}

	public function products()
	{
		return $this->hasMany(Product::class, 'seller_uid');
	}

	public function r_seller_vouchers()
	{
		return $this->hasMany(RSellerVoucher::class, 'seller_uid');
	}

	public function shopping_carts()
	{
		return $this->hasMany(ShoppingCart::class, 'buyer_uid');
	}
}
