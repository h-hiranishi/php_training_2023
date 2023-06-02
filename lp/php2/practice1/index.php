<?php
$fileHandle = fopen("sample.txt", "r");
if ( !$fileHandle ) { 
    $fileHandle = fopen("sample.txt", "x+");
}
$count = fread($fileHandle, 1);
fclose($fileHandle);
echo $count++;
$fileHandle = fopen("sample.txt", "w");
fwrite($fileHandle, (string)$count);
fclose($fileHandle);

?>