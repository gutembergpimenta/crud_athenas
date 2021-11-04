<?php

$host = 'localhost' ;
$dbnome = 'dbcrud';
$user = 'root';
$senha = '';

try {
    $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbnome, $user, $senha);
    return;
} catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage();
}