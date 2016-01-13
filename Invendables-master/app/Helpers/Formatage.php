<?php

namespace App\Helpers;

class Formatage {

    public static function full_name($first_name,$last_name) {
        return $first_name . ', '. $last_name;   
    }

    public static function remove_accent($string){
    	$string = strtr($string, 'ÁÀÂÄÃÅÇÉÈÊËÍÏÎÌÑÓÒÔÖÕÚÙÛÜÝ', 'AAAAAACEEEEEIIIINOOOOOUUUUY');
		$string = strtr($string, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');

		return $string;
    }

	public static function create_slug($string){
	   	return preg_replace('/[^A-Za-z0-9-]+/', '_', Formatage::remove_accent($string));
	}
}