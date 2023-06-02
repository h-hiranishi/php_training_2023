<?php
$fileHandle = fopen("numbers.txt", "r");
$count = 0;
$sum = 0;
for ( $count = 0; true; $count++ ) {
    $val = fgets($fileHandle);
    if ( !$val ) { break; }
    $sum += $val;
}
echo "<p>" . "合計: " . $sum . "</p>";
echo "<p>" . "平均: " . $sum/$count . "</p>";
?>