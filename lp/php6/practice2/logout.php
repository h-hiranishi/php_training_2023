<?php

    // setcookie("id", "", time() - 100);
    // setcookie("password", "", time() - 100);
    session_start();
    $_SESSION = array();
    session_destroy();

    $filename = "tmpl/login.html";
    $file_handler = fopen($filename, "r");
    $tmpl = fread($file_handler, filesize($filename));
    $str = <<<_HTML_
        <h1>ログアウトしました。</h1>
        <a href=session.html>ログインページに戻る</a>
    _HTML_;
    $html = str_replace("!body!", $str, $tmpl);
    echo $html;

?>