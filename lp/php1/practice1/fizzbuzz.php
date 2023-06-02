<h1>FizzBuzz</h1>
<?php
    $index = 0;
    for ( $index = 1; $index <= 100; $index++ ) {
        $str = "<p>";
        if ( $index % 3 != 0 && $index % 5 != 0 ) {
            $str .= $index;
        }
        if ( $index % 3 == 0 ) {
            $str .= 'Fizz';
        }
        if ( $index % 5 == 0 ) {
            $str .= 'Buzz';
        }
        $str .= "</p>";
        echo $str;
    }
?>
<h1>to be continue...</h1>
