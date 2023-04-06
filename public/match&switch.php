<?php 
$paymentStatus =1;
// Switch expression


switch ($paymentStatus) {
	case 1:
		echo "paid";
		break;
	case 2:
	case 3:
		echo "payment declined";
		// code...
		break;
	case 0:
			// code...
		echo "payment pending";
			break;	
	default:
		echo "Unknown payment Status";
		break;
}
echo "<br>";
//Match expression -> it is the same with the switch statement

match ($paymentStatus) {
	1=> print 'Paid',
	2=> print 'payment declined',
	0=> print 'payment pending',
	default => 'Unknown payment Status'
};
/* differences

1. match() is an expression and it can be assigned to a variable;
2. No break statement
3.no default needed in match expression
4. Match does strict comparison.
 

*/
?>