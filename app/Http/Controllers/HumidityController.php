<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HumidityController extends Controller {
	public function get() {
		dd(session("user"));
    	return "Humidity";
	}
}
