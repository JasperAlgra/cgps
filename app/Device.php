<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Device extends Eloquent
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'devices';


	/**
	 * Get reports for a device
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function reports()
	{
		return $this->hasMany('App\Report');
	}

}
