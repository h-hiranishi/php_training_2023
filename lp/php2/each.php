<?php
$fruits = array("red" => "apple", "yellow" => "banana");
while ( list($key, $val) = each ($fruits) ) {
	echo "キー $key 値 $val<br>";
}
