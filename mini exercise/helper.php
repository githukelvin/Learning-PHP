 <?php

declare(strict_types=1);

function formatD(float $amount){
	$isNegative = $amount <0;

	return( $isNegative ? '-' : '') . '$' .number_format(abs($amount),2);
}


function fdate(string $date):string{

	return date('M j,Y',strtotime($date));

}



?>