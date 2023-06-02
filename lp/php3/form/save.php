<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>save</title>
    </head>
    <body>
        <?php
            $name = htmlentities($_GET["name"], ENT_QUOTES, "UTF-8");
            $email = htmlentities($_GET["email"], ENT_QUOTES, "UTF-8");
            $inquiry = htmlentities($_GET["inquiry"], ENT_QUOTES, "UTF-8");
            $file_handler = fopen("save.csv", "a");
            $arr = array($name, $email, $inquiry);
            // fwrite($file_handler, $str);
            fputcsv($file_handler, $arr);
            fclose($file_handler);
            echo "<h1>Thank you!</h1>";
        ?>
    </body>
</html>