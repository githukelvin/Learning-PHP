<?php

declare(strict_types =1 );

require "./helper.php";

function OpenFile():array{
	$files = [];

	foreach (scandir(__DIR__) as $file) {
		if(is_dir($file)){
			continue;		
		}
		$files[]=$file;

		
		
	};

	return $files;
}


$files=OpenFile();

// print_r( $files);


function readFiles(string $file){

	if(file_exists($file)){
		$file = fopen($file,'r');

		fgetcsv($file);

		$transactions = [];
	
		// $array[]=fgetcsv($file);
		while(($transaction =fgetcsv($file)) !=false){
			$transactions[]=ExtractTransaction($transaction);


	}

	fclose($file);

	}
	else{
		trigger_error("File" .$file . "does not exist",E_USER_ERROR);
	}
	return $transactions;
}

$transactions=[];
$transactions = array_merge($transactions,readFiles($files[3]));



function ExtractTransaction($transactions):array{
	[$date,$checknumber,$desc,$amount]=$transactions;
	$amount=(float)str_replace(['$', ','],'', $amount);
	return[
		'date' => $date,
		'checkNumber'=>$checknumber,
		'description' => $desc,
		'amount' => $amount
	];
	
	
};

function totals(array $transactions):array {
	$totals =['netTotal' =>0,'totalIncome'=>0,'totalExpense'=>0];
	foreach ($transactions as $transaction) {
		$totals['netTotal'] += $transaction['amount'];
		if($transaction['amount'] >= 0){
			$totals['totalIncome'] +=$transaction['amount'];
		}
		else{
			$totals['totalExpense'] += $transaction['amount'];
		}
	}

	return $totals;
};



$cTotal = totals($transactions);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Table</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	
	<table>
		<thead>
			<tr>
				<th>Date</th>
				<th>Check</th>
				<th>Description</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($transactions)): ?>
				<?php foreach ($transactions as $transaction): ?>
					<tr>
						<td><?= fdate($transaction['date']) ?></td>
						<td><?= $transaction['checkNumber'] ?></td>
						<td><?= $transaction['description'] ?></td>
						<td><?php if ($transaction['amount']<0): ?>
						<span style="color: red;"><?= formatD($transaction['amount']) ?></span>
						<?php elseif ($transaction['amount']>0):?>
							<span style="color:green;">
								<?= formatD($transaction['amount']) ?>
							</span>
						<?php else:?>
							<span >
								<?= formatD($transaction['amount']) ?>
							</span>
						<?php endif?>
							</td>
					</tr>
				<?php endforeach ?>
		<?php endif  ?>
			
		</tbody>
		<tfoot>
			<tr>
				<th colspan="3">Total Income:</th>
				<td><?= formatD($cTotal['totalIncome'] )?? 0 ?><td>
				
			</tr>
			<tr>
				<th colspan="3">Total Expense:</th>
				<td><?=  formatD($cTotal['totalExpense']) ?? 0 ?></td>
			</tr>
			<tr>
				<th colspan="3">Net Total:</th>
				<td><?=  formatD($cTotal['netTotal']) ?? 0 ?></td>
			</tr>
		
		</tfoot>
		
	</table>
</body>
</html>
