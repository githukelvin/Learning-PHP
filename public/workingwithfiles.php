<?php

/*working with files

1.scandir() -> is a method used to check file in a folder
2.__DIR__ -> This shows the current directory.
3. mkdir() ->to create directory
4. rmdir() -> to remove director
5. is_dir() ->to check if it is a directory
6. is_file() -> to check if is a file;  
7. file_exists() -> to check existence of the file
8. file_put_contents() puts content into the file
9. clearstatcache() ->it removes caches

*/

$dir =scandir(__DIR__);
// mkdir('keln');
// mkdir("kel/githu" ,recursive:true);
// rmdir('kelvn');

$file = file_exists('logs.txt');

if($file){
	echo filesize('logs.txt');

	
	// file_put_contents('logs.txt', 'hello world');
	// clearstatcache();
	// echo filesize('logs.txt');


}
else{
	echo "The file does not exist";
}



// var_dump($dir);


echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";

// Opening file

/*

1.fopen() -> opens a selected file an it accepts two values 1 the file name and secondly the mode . It creates  a resouce
2.@fopen() ->it does the sam e as fopen() but it suppress the errors
3.fgets() gets line in the file opened
4.fclose() closes the file

*/

$fileOpen = fopen('logs.txt', 'r');
while(($line = fgets($fileOpen)) === true){
	echo $line . '<br/>';
};
echo($fileOpen);







echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";

// Another way to read files

/*
1.file_get_contents() -> gets the content of the file;
2.unlink()->removes or deletes files
3.copy()-> used to copy contents of the file accepts the file to be copied and file to be pasted
4.rename() move files


*/

$contents = file_get_contents('logs.txt');  

file_put_contents('foo.txt','data :kelvin \n', FILE_APPEND);

unlink('index.html');

copy('index.html','logs.txt');


echo $contents;

rename('lod.txt', 'logs.txt')

?>