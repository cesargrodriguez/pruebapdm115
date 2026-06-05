<?php
$year=$_REQUEST['year'];
$month=$_REQUEST['month'];
$day=$_REQUEST['day'];
///variable
$servername=$_ENV['DB_HOST'];
$username=$_ENV['DB_USER'];
$dbname=  $_ENV['DB_NAME'];
$password=$_ENV['DB_PASS'];

// Create connection
//nuevo 
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$consulta ="Select * from MATERIA where fecha_modificado>'".$year."-".$month."-".$day."'";
if ($resultado = $mysqli->query($consulta)) {
	$filas=array();
    /* obtener un array asociativo */
    //cambio
    while ($reg = $resultado->fetch_assoc()) {
        $filas[]=$reg;
    }
        echo json_encode($filas);
    /* liberar el conjunto de resultados */
    $resultado->free();
}
/* cerrar la conexión */
$mysqli->close();
?>
