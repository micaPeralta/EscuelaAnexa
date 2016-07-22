<?php 
/**
* 
*/
namespace App\Helpers;

/**
* 
*/
class DateConvert
{
	public static function convertToDate($date){
		/*convierte  un string dd-mm-yyyy a una fecha valida para guardar en 
		la base de dato .Con formato yyyy-mm-dd */
		$return=date_create($date);
		return date_format($return,'Y-m-d');
	}

	public static function formatDate($date){
		$return=date_create($date);
		return date_format($return,'d-m-Y');
	}



}
    
