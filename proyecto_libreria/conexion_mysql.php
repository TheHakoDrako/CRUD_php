<?php

#Conexión a la base de datos:
$host = "localhost";
$database = "proyecto_libreria";
$user = "root";
$password = "THD123fj19.ms";

$conexionString = "mysql:host=$host;dbname=$database;charset=utf8";
try {
    $conexion = new PDO($conexionString, $user, $password);
    if (!$conexion) {
        echo "Error al conectar a la base de datos";
        exit();
    }
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $consulta = "SELECT * FROM usuarios";
    $consultaEjecutada = $conexion->query($consulta, PDO::FETCH_ASSOC);
    $resultado = $consultaEjecutada->fetchAll();
    var_dump($resultado);
} catch (PDOException $e) {
    throw $e;
}
