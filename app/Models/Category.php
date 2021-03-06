<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    
	/**
	 * The timestamps.
	 *
	 * @var bool
	 */
	public $timestamps = false;
}