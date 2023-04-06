<?php 

declare(strict_types = 1);

require_once "../Transaction.php";

// First method to access methods in a class

// $transaction = new Transaction(100,'transaction 1');
// $transaction->AddTax(10);
// $transaction->Discount(8);

// Second  method to access methods in a class

// $transaction1 = new Transaction(200,'transaction 2');
// $transaction1->Discount(15)->AddTax(8);

// third  method to access methods in a class

$amount = (new Transaction(100,'transaction 1'))
        ->AddTax(8)
        ->Discount(10)
        ->getAmount();


// Var dumping
var_dump( $amount);

?>