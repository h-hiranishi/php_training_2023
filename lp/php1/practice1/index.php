<h1>FizzBuzz</h1>
<?php
    $index = 0;
    for ( $index = 1; $index <= 100; $index++ ) {
        echo "<p>";
        if ( $index % 15 == 0 ) {
            echo 'FizzBuzz';
        } else if ( $index % 3 == 0 ) {
            echo 'Fizz';
        } else if ( $index % 5 == 0 ) {
            echo 'Buzz';
        } else {
            echo $index;
        }
        echo "</p>";
    }
?>
<h1>to be continue...</h1>
