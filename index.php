<?php 
function numberFormat($input){
	$units = "" ;
	$input = explode('.', $input);
	$number = $input[0];
	if(strlen($number)>3){
		$lastdigits = substr($number, strlen($number)-3, strlen($number));
		$restunits = substr($number, 0, strlen($number)-3);
		$restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; 
		$expressionvalue = str_split($restunits, 2);
		for($i=0; $i<sizeof($expressionvalue); $i++){
			if($i==0){
			  $units .= (int)$expressionvalue[$i].",";
			}else{
			  $units .= $expressionvalue[$i].",";
			}
		}
		$amount = $units.$lastdigits;
	}else{
	  	$amount = $number;
	}
	if(!empty($input[1])) {
		if(strlen($input[1]) == 1){
			return '₹ ' .$amount . '.' . $input[1] . '0';
		}elseif(strlen($input[1]) == 2){
			return '₹ ' .$amount . '.' . $input[1];
		}else{
	    	return '0';
		}
	}else{
		return '₹ ' .$amount.'.00';
	}
}
echo numberFormat(5115576903.36);