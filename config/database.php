<?php
    session_start();
    global $pdo;
    try {
        $pdo = new PDO("mysql:dbname=classificados;host=localhost", "root", "");
    } catch (PDOException $e) {
       echo "Conexão falhou: ".$e->getMessage();
       exit();
    }
?>