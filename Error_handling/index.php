<?php

declare(strict_types = 1);

// Error Handling

function errorHandler(
    int $type,
    string $message,
    ?string $file = null,
    ?int $line = null,
){
    echo "Error: $type .: $message in $file on line $line";
    exit;
}
// error_reporting(E_ALL & ~E_WARNING);

set_error_handler('errorHandler',E_ALL);

echo $x

?>