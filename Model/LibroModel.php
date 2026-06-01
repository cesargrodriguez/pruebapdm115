<?php

require "conexion.php";


    function guardarLibro($nombreLibro,$editorial,$existencias)
    {
        //Con global accedemos a la variable de conexión definida en conexion.php para 
        // usarla dentro de esta función.
        global $conexion;
        $sql = "INSERT INTO libros(NombreLibro, Editorial, Existencias)
                VALUES(:NombreLibro, :Editorial, :Existencias)";

        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':NombreLibro', $nombreLibro);
        $stmt->bindParam(':Editorial', $editorial);
        $stmt->bindParam(':Existencias', $existencias, PDO::PARAM_INT);
        $stmt->execute();

        return json_encode(["success" => true,"mensaje" => "Libro guardado correctamente"]);
    }

    function obtenerLibros()
    {
        global $conexion;
        $sql = "SELECT * FROM libros ORDER BY NumLibro DESC";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($libros);
    }

    function eliminarLibro($numLibro)
    {
        global $conexion;
        $sql = "DELETE FROM libros WHERE NumLibro = :NumLibro";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':NumLibro', $numLibro, PDO::PARAM_INT);
        $stmt->execute();
        return json_encode(["success" => true,"mensaje" => "Libro eliminado correctamente"]);
    }

?>