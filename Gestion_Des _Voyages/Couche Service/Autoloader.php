<?php
/**
* 
*/
class Autoloader
{
	static function register()
	{
		spl_autoload_register(array(__CLASS__,'charger1'));
		
		
	}
	static function charger1($classname)
	{
		if (file_exists('../Couche Metier/'.$classname.'.class.php')) {
			require '../Couche Metier/'.$classname.'.class.php';
		}
		if (file_exists('../Couche Service/'.$classname.'.php')) {
			require '../Couche Service/'.$classname.'.php';
		}
		
		
	}
	
}

?>