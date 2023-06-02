<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>form</title>
    </head>
    <body>
        <?php
            $name = htmlentities($_GET["name"], ENT_QUOTES, "UTF-8");
            $email = htmlentities($_GET["email"], ENT_QUOTES, "UTF-8");
            $inquiry = htmlentities($_GET["inquiry"], ENT_QUOTES, "UTF-8");
            $inquiry_br = str_replace("\r\n", "<br>", $inquiry);
            $inquiry_br = str_replace("\n", "<br>", $inquiry_br);
            $inquiry_br = str_replace("\r", "<br>", $inquiry_br);
            if ( $name == "" || $email == "" || $inquiry == "" ) {
                echo "<h1>You must full!!</h1>";
                if ( $name == "" ) {
                    echo "Please write name.<br>";
                }
                if ( $email == "" ) {
                    echo "Please write email.<br>";
                }
                if ( $inquiry == "" ) {
                    echo "Please write inquiry.<br>";
                }
                echo "<button type=\"button\" onclick=\"location.href='http://localhost:20080/php/teck_base_camp/lp/php3/form/back.php?name=$name&email=$email&inquiry=$inquiry'\">rewirte</button>";
            } else {
                echo "
                    <h1>Are you OK?</h1>
                    <form action=\"save.php\" method=\"get\" name=\"form\">
                        <p>name: $name </p>
                        <p>email: $email </p>
                        <p>inquiry: $inquiry_br </p>
                        <input type=\"hidden\" name=\"name\" value=\"$name\">
                        <input type=\"hidden\" name=\"email\" value=\"$email\">
                        <input type=\"hidden\" name=\"inquiry\" value=\"$inquiry\">
                        <button type=\"submit\" name=\"submit\" value=\"submit\">submit</button>
                    </form>
                    <button type=\"button\" onclick=\"location.href='http://localhost:20080/php/teck_base_camp/lp/php3/form/back.php?name=$name&email=$email&inquiry=$inquiry'\">back</button>
                ";
            }
        ?>
    </body>
</html>