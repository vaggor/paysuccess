<?php

namespace App\misc;



class Functions{

	public function formatAmount($amount){
		$strlen = strlen($amount);
		$dollarlen = $strlen - 2;
		$dollar = substr($amount, 0, $dollarlen);
		$cent = substr($amount, $dollarlen, 2);
		$result = $dollar.'.'.$cent;
		return $result;
	}

	


}

?>