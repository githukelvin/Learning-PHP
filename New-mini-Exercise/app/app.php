<?php

// FIRST WE OPEN THE FILES

function Readfiles(string $dirpath):array {
    $files=[];
    foreach(scandir($dirpath) as $file){
        if(is_dir($file)){
            continue;
        }
        $files[]= $dirpath.$file;
        

    }
    
    return $files;
};

function Openfiles(string $file):array{
    if(! file_exists($file)){
    trigger_error('File' .$file . 'Does not exist',E_USER_ERROR);
    }
    $Contents = fopen($file, 'r');
    fgetcsv($Contents);

    $transactions=[];

    while(($transaction = fgetcsv($Contents)) != false){
         $transactions[]=ExtractData($transaction) ;
    }
    fclose($Contents);
    return $transactions;
}


function ExtractData(array $transactions):array{
    [$date,$check,$description,$amount] =$transactions;
    $amount = (float) str_replace(['$',','],'',$amount);
    return [
        'date'=>$date,
        'check'=>$check,
        'description'=>$description,
        'amount' => $amount
    ];
}


function Total(array $transactions):array{
   $alltotals = [
    'netIncome'=>0,
    'totalExpense'=>0, 
    'totalIncome'=>0
];
foreach($transactions as $transaction){
    $alltotals['totalIncome'] += $transaction['amount'];
    if($transaction['amount'] < 0){
        $alltotals['totalExpense'] +=$transaction['amount'];
    }
    else{
        $alltotals['netIncome'] +=$transaction['amount'];
    }
}
    return $alltotals;

}


?>