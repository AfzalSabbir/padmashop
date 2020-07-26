<?php
namespace App\Helpers;

class ConfigHelper{
	/**
	 * get local language
	*/
	public static function getLocalLanguage()
	{
		if(\Config::get('app.locale') == 'en'){
			return true;
		}
		else{
			return false;
		}
	}
}