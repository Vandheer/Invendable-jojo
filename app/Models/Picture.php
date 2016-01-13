<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pictures';
    
	/**
	 * The timestamps.
	 *
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function advertisement() 
	{
		return $this->belongsToMany('App\Models\Advertisement', 'picture_advertisement_invalid', 'id_advertisement_invalid', 'id_picture');
	}
}