<?php
    $name = $_GET["name"];
    $comment = $_GET["comment"];
    // echo <<< _FORM_
    echo "
        <!doctype html>
        <html>
            <head>
                <meta charset=\"utf-8\">
                <title> 確認フォームPHP3</title>
            </head>
            <body>
                <p>
                    ■お名前<br>
                    $name
                </p>
                <p>
                    ■コメント<br>
                    $comment
                </p>
            </body>
        </html>
";
var_dump($_GET);
?>
<!-- </p></body></html>"; $fifle_handler=fopen("sample.html", "r")$line=fgets($file_handler);echo $line;fclose($file_handler);?> -->