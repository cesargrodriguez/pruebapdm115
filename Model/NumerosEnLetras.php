<?php
$numero=$_REQUEST['numero'];
switch($numero){
case 0:
$numeroLetras="cero * ";
break;
case 1:
$numeroLetras="uno * ";
break;
case 2:
$numeroLetras="dos * ";
break;
case 3:
$numeroLetras="tres * ";
break;
case 4:
$numeroLetras="cuatro * ";
break;
case 5:
$numeroLetras="cinco * ";
break;
case 6:
$numeroLetras="seis * ";
break;
case 7:
$numeroLetras="siete * ";
break;
case 8:
$numeroLetras="ocho * ";
break;
case 9:
$numeroLetras="nueve * ";
break;
default:
$numeroLetras="No es un digito";
}
$numeroString=array('numero'=>$numeroLetras);
echo json_encode($numeroString);
?>
