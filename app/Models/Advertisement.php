<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'advertisements_invalid';
    
	/**
	 * The timestamps.
	 *
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() 
	{
		return $this->belongsTo('App\Models\User', 'id_user');
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category() 
	{
		return $this->belongsTo('App\Models\Category', 'id_category');
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function type() 
	{
		return $this->belongsTo('App\Models\Type', 'id_type');
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function picture()
	{
		return $this->belongsToMany('App\Models\Picture', 'picture_advertisement_invalid', 'id_advertisement_invalid', 'id_picture');
	}

	public function city() 
	{
		return $this->belongsTo('App\Models\City', 'id_city');
	}
}