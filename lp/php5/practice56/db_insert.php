<?php

$data = [];
$data["name"] = htmlentities($_POST["name"], ENT_QUOTES, "UTF-8");
$data["tel"] = htmlentities($_POST["tel"], ENT_QUOTES, "UTF-8");
$data["email"] = htmlentities($_POST["email"], ENT_QUOTES, "UTF-8");
$data["course"] = htmlentities($_POST["course"][0], ENT_QUOTES, "UTF-8");
$empty = [];

foreach ( $data as $key => $val ) {
    if ( $val == "" ) {
        $empty = [...$empty, $key];
    }
}

if ( empty($empty) ) {
    output_send($data);
} else {
    output_error($empty);
}

function save_data($data) {
    // データの格納
    // 接続設定
    $dsn = 'mysql:host=localhost; dbname=booksample; charset=utf8';
    $user = 'testuser';
    $pass = 'testpass';
    
    try{
        $dbh = new PDO($dsn, $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($dbh == null){
            # エラーが起きたとき、ここは実行されずにcatch 内が実行
        }else{
            $SQL = <<<_SQL_
                INSERT INTO user (
                    name,
                    tel,
                    email,
                    course
                ) VALUES (
                    '{$data["name"]}',
                    '{$data["tel"]}',
                    '{$data["email"]}',
                    '{$data["course"]}'
                );
            _SQL_;
            $stmt = $dbh->prepare($SQL);
            $stmt->execute();
            // $dbh->query($SQL);
        }
    }catch (PDOException $e){
        echo(' エラー内容：'.$e->getMessage());
        die();
    }
    $dbh = null;
}

function output_send($data) {
    // データの格納
    save_data($data);
    // 表示データの作成
    $file_name = "tmpl/send.tmpl";
    $file_handler = fopen($file_name, "r");
    $tmpl = fread($file_handler, filesize($file_name));
    fclose($file_handler);
    // 表示
    echo $tmpl;
}

function output_error($empty) {
    // 表示データの作成
    $file_name = "tmpl/error.tmpl";
    $file_handler = fopen($file_name, "r");
    $tmpl = fread($file_handler, filesize($file_name));
    fclose($file_handler);
    // 表示
    $info = implode(", ", $empty);
    $html = str_replace("!info!", $info, $tmpl);
    echo $html;
}

?>