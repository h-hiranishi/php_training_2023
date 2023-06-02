<?php
$fh = "animals.txt";
$file_handle = fopen($fh , "a+");
fwrite($file_handle , "Wolf\n");
fclose($file_handle);
echo "Wolfを追加しました。";