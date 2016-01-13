<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conutry extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';
    
	/**
	 * The timestamps.
	 *
	 * @var bool
	 */
	public $timestamps = false;
}