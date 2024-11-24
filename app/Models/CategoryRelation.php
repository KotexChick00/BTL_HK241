<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoryRelation
 * 
 * @property int $parent_category_id
 * @property int $child_category_id
 * @property int $level
 * 
 * @property Category $category
 *
 * @package App\Models
 */
class CategoryRelation extends Model
{
	protected $table = 'category_relations';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'parent_category_id' => 'int',
		'child_category_id' => 'int',
		'level' => 'int'
	];

	protected $fillable = [
		'level'
	];

	public function category()
	{
		return $this->belongsTo(Category::class, 'parent_category_id');
	}
}
