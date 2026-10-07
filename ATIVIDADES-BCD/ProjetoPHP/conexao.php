<?php

$host = "192.168.10.96";
$usuario = "postgres";
$senha = "1524";
$banco = "lojadantas";

$pdo = new PDO(
    "pgsql:host=$host;port=5432;dbname=$banco",
    $usuario,
    $senha
);







?>