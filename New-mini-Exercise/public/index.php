<?php 
declare(strict_types=1);
$root = dirname(__DIR__) .DIRECTORY_SEPARATOR;
define('APP_PATH',$root .'app'. DIRECTORY_SEPARATOR);
define('FILES_PATH',$root .'transaction_files'. DIRECTORY_SEPARATOR);
define('VIEWS_PATH',$root .'views'. DIRECTORY_SEPARATOR);
require APP_PATH . 'app.php';
$files = Readfiles(FILES_PATH);
$transactions=[];
foreach($files as $file){

    $transactions = array_merge($transactions,Openfiles($file));
}
$total = Total($transactions);
require APP_PATH . 'helper.php';
require VIEWS_PATH .'transactions.php';

?>