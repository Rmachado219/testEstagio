<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=mBonita;charset=utf8mb4;port3306', 'root', '');
} catch (PDOException $e) {
    print "Erro: " . $e->getMessage() . "<br/>";
    die();
}
?>