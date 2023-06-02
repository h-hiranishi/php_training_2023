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
            echo "
                <form action=\"form.php\" method=\"get\" name=\"form\">
                    <p>name: <input type=\"name\" name=\"name\" value=\"$name\"></p>
                    <p>email: <input type=\"email\" name=\"email\" value=\"$email\"></p>
                    <p>inquiry<br>
                        <textarea name=\"inquiry\">$inquiry</textarea>
                    </p>
                    <button type=\"submit\" name=\"submit\" value=\"送信\">confirm</button>
                </form>
            ";
            // $name . $email . $inquiry;
        ?>
    </body>
</html>