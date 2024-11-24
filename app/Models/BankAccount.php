<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BankAccount
 * 
 * @property int $bank_account_id
 * @property int $holder_uid
 * @property string $account_number
 * @property string $bank_name
 * @property string $branch_name
 * @property string $holder_name
 * @property bool $is_default
 * 
 * @property User $user
 *
 * @package App\Models
 */
class BankAccount extends Model
{
	use \Illuminate\Database\Eloquent\Factories\HasFactory;
	protected $table = 'bank_accounts';
	protected $primaryKey = 'bank_account_id';
	public $timestamps = false;

	protected $casts = [
		'holder_uid' => 'int',
		'is_default' => 'bool'
	];

	protected $fillable = [
		'holder_uid',
		'account_number',
		'bank_name',
		'branch_name',
		'holder_name',
		'is_default'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'holder_uid');
	}
}
