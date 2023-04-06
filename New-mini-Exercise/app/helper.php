<?php

declare(strict_types =1);

function formatamount(float $amount){
    $isNegative = $amount <0;
    return ($isNegative ? '-' : ''). '$' .number_format(abs($amount),2);

}

function formatDate(string $date):string{
    return date('M j,y',strtotime($date));
}



?>