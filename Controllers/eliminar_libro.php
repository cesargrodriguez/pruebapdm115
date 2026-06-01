<?php
header('Content-Type: application/json');
require_once "../Model/LibroModel.php";

$datos = json_decode(file_get_contents("php://input"), true);
$numLibro = intval($datos['NumLibro']);

if($numLibro <= 0)
{
    echo json_encode(["success" => false,"mensaje" => "ID inválido"]);
    exit;
}

try
{
    $resultado=eliminarLibro($numLibro);
    echo $resultado;
}
catch(PDOException $e)
{
    echo json_encode(["success" => false,"mensaje" => $e->getMessage()]);
}

?>