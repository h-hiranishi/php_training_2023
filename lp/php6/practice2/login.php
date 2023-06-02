<?php

    $root_id = "yamada";
    $root_password = "0123";
    session_start();
    handler();
    function handler() {
        // 宣言
        global $root_id;
        global $root_password;
        $user_id = "";
        $user_password = "";
        $post_id = "";
        $post_password = "";
        // 情報の整理
        if ( isset($_SESSION["id"]) ) { $user_id = $_SESSION["id"]; }
        if ( isset($_SESSION["password"]) ) { $user_password = $_SESSION["password"]; }
        if ( isset($_POST["id"]) ) { $post_id = $_POST["id"]; }
        if ( isset($_POST["password"]) ) { $post_password = $_POST["password"]; }
        // 表示内容のハンドリング
        if ( $root_id === $user_id && $root_password === $user_password ) {
            output_mypage();
        } else if ( $root_id === $post_id && $root_password === $post_password ) {
            $_SESSION["id"] = $post_id;
            $_SESSION["password"] = $post_password;
            output_accept();
        } else {
            output_login_fatel();
        }
    }

    function output_mypage() {
        $filename = "tmpl/login.html";
        $file_handler = fopen($filename, "r");
        $tmpl = fread($file_handler, filesize($filename));
        $id = $_SESSION["id"];
        $str = <<<_HTML_
            <h1>ログイン中です。</h1>
            <h2>現在は、$id のアカウントです。</h2>
            <a href=logout.php>ログアウト</a>
        _HTML_;
        $html = str_replace("!body!", $str, $tmpl);
        echo $html;
    }

    function output_login_fatel() {
        $filename = "tmpl/login.html";
        $file_handler = fopen($filename, "r");
        $tmpl = fread($file_handler, filesize($filename));
        $str = <<<_HTML_
            <h1>ログイン失敗</h1>
            <a href=session.html>前画面に戻る</a>
        _HTML_;
        $html = str_replace("!body!", $str, $tmpl);
        echo $html;
    }

    function output_accept() {
        $filename = "tmpl/login.html";
        $file_handler = fopen($filename, "r");
        $tmpl = fread($file_handler, filesize($filename));
        $str = <<<_HTML_
            <h1>ログイン成功</h1>
            <a href=login.php>マイページに進む</a>
        _HTML_;
        $html = str_replace("!body!", $str, $tmpl);
        echo $html;
    }

?>