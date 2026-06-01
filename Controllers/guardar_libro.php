<?php
header('Content-Type: application/json');
require_once "../Model/LibroModel.php";

$datos = json_decode(file_get_contents("php://input"), true);
$nombreLibro = trim($datos['NombreLibro']);
$editorial = trim($datos['Editorial']);
$existencias = intval($datos['Existencias']);

if (empty($nombreLibro) || empty($editorial) || $existencias < 0)
{
    echo json_encode(["success" => false,"mensaje" => "Datos inválidos"]);
    exit;
}

try
{
    $resultado=guardarLibro($nombreLibro,$editorial,$existencias);
    echo $resultado;
}
catch(PDOException $e)
{
    echo json_encode(["success" => false,"mensaje" => $e->getMessage()]);
}

?>