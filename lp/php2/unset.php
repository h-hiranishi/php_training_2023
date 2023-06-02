<?php
$fruits = array("red" => "apple" , "yellow" => "banana");
print_r($fruits);
echo "<br>";
unset($fruits["yellow"]);
print_r($fruits);
