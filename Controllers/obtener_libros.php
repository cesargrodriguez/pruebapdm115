<?php
header('Content-Type: application/json');
require_once "../Model/LibroModel.php";

try
{
    $resultado=obtenerLibros();
    echo $resultado;
}
catch(PDOException $e)
{
    echo json_encode(["success" => false,"mensaje" => $e->getMessage()]);
}
?>