<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=mBonita;charset=utf8mb4;port3306', 'root', '');
    foreach($dbh->query('SELECT * from FOO') as $row) {
        print_r($row);
    }
} catch (PDOException $e) {
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
?>