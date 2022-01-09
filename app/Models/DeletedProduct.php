<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DeletedProduct
 * 
 * @property int $id
 * @property string|null $name
 *
 * @package App\Models
 */
class DeletedProduct extends Model
{
	protected $table = 'deleted_products';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}
