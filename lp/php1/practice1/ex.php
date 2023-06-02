<?php
    $arr = array("sato" => 80, "ito" => 70, "kato" => 90);
    $sum = 0;
    $max = 0;
    $winner = "";
    foreach ( $arr as $key => $val ) {
        $sum +=  $val;
        if ( $max < $val ) {
            $winner = $key;
            $max = $val;
        }
    }
    $avg = $sum/count($arr);
    echo "<dl>";
    echo "<dt>" . "平均点" . "</dt>";
    echo "<dd>" . $avg . "</dd>";
    echo "<dt>" . "最高得点者" . "</dt>";
    echo "<dd>" . $winner . "</dd>";
    echo "</dl>";
?>