<?php
$fileHandle = fopen("numbers2.txt", "r");
$count = 0;
$sum = 0;
for ( $i = 0; true; $i++ ) {
    $val = fgets($fileHandle);
    if ( !$val ) { break; }
    $arr = explode(" ", $val);
    $c = 0;
    $s = 0;
    foreach ( $arr as $v ) {
        // echo $v . ", ";
        $s += $v;
        $c++;
    }
    echo "<p>{$i}.<br> 合計: {$s}<br>平均: " . $s/$c . "</p>";
    $sum += $s;
    $count += $c;
}
echo "<p>ALL.<br> 合計: {$sum}<br>平均: " .  $sum / $count . "</p>";
?>