<?php
$codmateria=$_REQUEST['codmateria'];
$carnet=$_REQUEST['carnet'];
$ciclo=$_REQUEST['ciclo'];
$notafinal=$_REQUEST['notafinal'];
///variable
$servername=$_ENV['DB_HOST'];
$username=$_ENV['DB_USER'];
$dbname=  $_ENV['DB_NAME'];
$password=$_ENV['DB_PASS'];

echo $codmateria . $carnet . $ciclo .  $notafinal;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO NOTA(codmateria,carnet,ciclo,notafinal) VALUES(?,?,?,?)";
$insertar = $conn->prepare($sql);
$insertar->bind_param("sssd",$codmateria,$carnet,$ciclo,$notafinal);
if ($insertar->execute()) 
{
    echo json_encode(["resultado" => "ok","mensaje"   => "Registro insertado correctamente"]);
} 
else
{
    echo json_encode(["resultado" => "error","mensaje"   => $insertar->error]);
}
$conn->close();
?>
