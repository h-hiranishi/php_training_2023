<?php
$a = 1;
function test(){ 
  global $a;
  echo $a;
} 
test();