<?php
function tax($price) {
   $tax_price = $price * 1.08;
   return $tax_price;
 }
 echo (tax(100));