<?php
$dir = "sample/text";
$dh = opendir($dir);
while(($rh = readdir($dh)) != false){
echo "filename:" . $rh . "<br>";
}
closedir($dh);
