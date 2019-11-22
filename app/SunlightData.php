<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SunlightData extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'value'
    ];

    public function user() {
		return $this->belongsTo("\App\User");
	}
}