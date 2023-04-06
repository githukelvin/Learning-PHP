<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($transactions)):?>
         <?php foreach($transactions as $transaction):?> 
            <tr>
                <td><?= formatDate($transaction['date'])?></td>   
                <td><?= $transaction['check']?></td>  
                <td><?= $transaction['description']?></td>
                <td>
                  <?php if( $transaction['amount'] < 0): ?>
                     <span style="color:red;"><?= formatamount($transaction['amount'])?></td></span> 
                    <?php elseif($transaction['amount'] > 0 ):?>
                         <span style="color:green;"><?= formatamount($transaction['amount'])?></td></span> 
                    <?php else:?>
                         <span><?= formatamount($transaction['amount'])?></td></span> 
                    <?php endif?>
            </tr>
            <?php endforeach ?>
        <?php endif ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">Total Income</th>
                <td><?= formatamount($total['totalIncome'])?></td>
            </tr>
            <tr>
                <th colspan="5">Net Income</th>
                <td><?= formatamount($total['netIncome'])?></td>
            </tr>
            <tr>
                <th colspan="5">Total Expenses</th>
                <td><?= formatamount($total['totalExpense'])?></td>
            </tr>
        </tfoot>
    </table>
    
</body>
</html>