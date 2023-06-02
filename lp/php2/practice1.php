<?php
$dat = fopen("sample.txt","r+");
flock($dat , LOCK_EX);
$count = (int)fgets($dat);
$count = $count +1;
rewind($dat);
fwrite($dat,$count);
flock($dat , LOCK_UN);
fclose($dat);
echo $count;