<?php
declare(strict_types = 1);
require('./Transaction.php');

$transaction = new Transaction(100,'Transaction 1');

$transaction->Discount(70);

var_dump(phpinfo());

?>