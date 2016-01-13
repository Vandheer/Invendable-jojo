<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'regions';
    
	/**
	 * The timestamps.
	 *
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function country() 
	{
		return $this->belongsTo('App\Models\Country');
	}
}

