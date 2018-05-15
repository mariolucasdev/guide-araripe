<?php

$dsn = "mysql:host=localhost;dbname=guide_araripe;charset=utf8";
$user = "root";
$pass = "";

try {
  $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
  echo "Erro na conexão com banco de dados: ".$e->getMessage();
}
