<?php  
declare(strict_types=1);

$str ='{"a":1,"b":2,"c":3}';


$arr=json_decode($str);

$obj = new \stdClass();

$obj->a = 1;
$obj->b = 2;
$obj->c = 3;

$arr2= [1,2,3];
$obj1=(object) $arr;
var_dump($arr->a);

echo "<br>";
var_dump($obj);
echo "<br>";
var_dump($obj1)

?>