<?php

    setcookie("id", "", time() - 100);
    setcookie("password", "", time() - 100);

    $filename = "tmpl/login.html";
    $file_handler = fopen($filename, "r");
    $tmpl = fread($file_handler, filesize($filename));
    $str = <<<_HTML_
        <h1>ログアウトしました。</h1>
        <a href=cookie.html>ログインページに戻る</a>
    _HTML_;
    $html = str_replace("!body!", $str, $tmpl);
    echo $html;

?>