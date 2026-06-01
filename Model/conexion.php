<?php

$host = $_ENV['DB_HOST'] ?? "localhost";
$usuario = $_ENV['DB_USER'] ?? "root";
$password = $_ENV['DB_PASS'] ??  "";
$bd = $_ENV['DB_NAME'] ?? "biblioteca_spa";

try
{
    $conexion = new PDO("mysql:host=$host;dbname=$bd;charset=utf8",$usuario,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión exitosa";
}
catch(PDOException $e)
{
    die("Error de conexión: " . $e->getMessage());
}

?>