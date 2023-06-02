<?php
$dsn = 'mysql:host=localhost; dbname=booksample; charset=utf8';
$user = 'testuser';
$pass = 'testpass';

try {
    $dbh = new PDO($dsn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "success!!<br>";
} catch ( PDOException $e ) {
    echo "failed....<br>";
    echo $e->getMessage() . "<br>";
    die();
}
$dbh = null;
?>

