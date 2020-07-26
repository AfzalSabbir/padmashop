<?php
namespace App\Helpers;

use DB;

class CalculationHelper
{
	public static function generateVoucher($id)
	{
		$voucher = $id;
		$initial_id = strlen((string)$id);
		if($initial_id < 2){
			$voucher = "00000".$voucher;
		}
		elseif($initial_id < 3){
			$voucher = "0000".$voucher;
		}
		elseif($initial_id < 4){
			$voucher = "000".$voucher;
		}
		elseif($initial_id < 5){
			$voucher = "00".$voucher;
		}
		elseif($initial_id < 6){
			$voucher = "0".$voucher;
		}
		else{
			$voucher = $voucher;
		}
		return $voucher;
	}
}
