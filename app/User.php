<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'arduino_token', 'app_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function humidityData() {
		return $this->hasMany("\App\HumidityData");
	}

	public function temperatureData() {
		return $this->hasMany("\App\TemperatureData");
	}

	public function temperatureSetting() {
		return $this->hasOne("\App\TemperatureSetting");
	}

	public function doorSetting() {
		return $this->hasOne("\App\DoorSetting");
	}

	public function sunlightData() {
		return $this->hasMany("\App\SunlightData");
	}

	public function chickenEntries() {
		return $this->hasMany("\App\ChickenEntries");
	}

	public function chickenCount() {
		return $this->hasOne("\App\ChickenCount");
	}

	public function predatorBreaches() {
		return $this->hasMany("\App\PredatorBreach");
	}
}