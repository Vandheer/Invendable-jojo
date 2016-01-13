<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departments';
    
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
	public function region() 
	{
		return $this->belongsTo('App\Models\Region');
	}
}