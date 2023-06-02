<?php

$data = [];
$data["name"] = htmlentities($_POST["name"], ENT_QUOTES, "UTF-8");
$data["tel"] = htmlentities($_POST["tel"], ENT_QUOTES, "UTF-8");
$data["email"] = htmlentities($_POST["email"], ENT_QUOTES, "UTF-8");
$data["course"] = htmlentities($_POST["course"][0], ENT_QUOTES, "UTF-8");
output_send($data);

function search_data($data) {
    // 接続設定
    $dsn = 'mysql:host=localhost; dbname=booksample; charset=utf8';
    $user = 'testuser';
    $pass = 'testpass';
    $src = "";
    
    try{
        $dbh = new PDO($dsn, $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($dbh == null){
        }else{
            // $SQL = "SELECT * FROM user WHERE ? ;";
            $values = [];
            foreach ( $data as $key => $val ) {
                if ( $val != "" ) {
                    array_push($values, $key . " = " . "\"{$val}\"");
                }
            }
            $SQL = "SELECT * FROM user WHERE " . implode(" OR ", $values) . ";";
            $stmt = $dbh->prepare($SQL);
            $stmt->execute();
            while ( $row = $stmt->fetch() ) {
                $src .= "<tr>";
                foreach ( $row as $val ) {
                    $src .= "<td> {$val} </td>";
                }
                $src .= "</tr>";
            }
        }
    }catch (PDOException $e){
        echo(' エラー内容：'.$e->getMessage());
        die();
    }
    $dbh = null;
    return $src;
}

function output_send($data) {
    $src = search_data($data);
    // 表示データの作成
    $file_name = "tmpl/search.tmpl";
    $file_handler = fopen($file_name, "r");
    $tmpl = fread($file_handler, filesize($file_name));
    fclose($file_handler);
    $tmpl = str_replace("!data!", $src, $tmpl);
    // 表示
    echo $tmpl;
}

?>