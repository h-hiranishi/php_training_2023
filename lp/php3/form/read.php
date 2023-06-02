<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>read</title>
    </head>
    <body>
        <?php
            $password = htmlentities($_POST["password"], ENT_QUOTES, "UTF-8");
            if ( $password != "staff-only" ) {
                echo "
                    <h1>Who are you?</h1>
                    <p>Your are failed!!!</p>
                    <form action=\"read.php\" method=\"post\" name=\"form\">
                        <input type=\"password\" name=\"password\">'
                    </form>
                ";
            } else {
                $file_handler = fopen("save.csv", "r");
                while ( $line = fgetcsv($file_handler) ) {
                    $str = "<dl>";
                    $str .= "<dt>name: " . $line[0] . ", email: " . $line[1] . "</dt>";
                    $str .= "<dd>inquiry: "  . $line[2] . "</dd>";
                    $str .= "</dl>";
                    echo $str . "<br>";
                }
            }
        ?>
    </body>
</html>