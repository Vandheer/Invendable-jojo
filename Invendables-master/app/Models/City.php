<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';
    
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
	public function department() 
	{
		return $this->belongsTo('App\Models\Department');
	}
}