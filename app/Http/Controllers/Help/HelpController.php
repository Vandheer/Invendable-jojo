<?php

namespace App\Http\Controllers\Help;

use App\Http\Controllers\Controller;

class HelpController extends Controller
{
	public function aide() {
		return view('front.help.help');
	}
	
}