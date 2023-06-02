<?php

# データベースに接続
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
        INSERT INTO copyuser VALUE 
        ( );
        SELECT * FROM copyuser;
_SQL_;

    $dbh->query($SQL);
    echo("");
    }
}catch (PDOException $e){
    echo(' エラー内容：'.$e->getMessage());
    die();
}
$dbh = null;
