<?php

require_once 'Clases/conexion_db.php';

#Antes de usar el patron Singleton:
#$db = new ConexionDB();
#$db->conectar();
#$resultado = $db->query("SELECT * FROM usuarios");
#echo "Desde el archivo:";
#var_dump($resultado);

#Usando el patron Singleton:
#$resultado = ConexionDB::getInstance()->query("SELECT * FROM usuarios");
#$otro_resultado = ConexionDB::getInstance()->query("SELECT name FROM usuarios");
#var_dump($resultado, $otro_resultado);

#Metodo para insertar (TRUE si se inserto, FALSE si no):
/* $datos=[
    'name' => 'Usuario',
    'email' => 'usuario@gmail.com',
    'password' => 'usuario123'
];
$resultado = ConexionDB::getInstance()->insert("usuarios", $datos);
var_dump($resultado); */

#Metodo para actualizar (TRUE si se actualizo, FALSE si no):
/* $idEditar = 2;
$datosModificados=[
    'name' => 'Usuario Editado',
    'email' => 'actualizado@gmail.com',
    'password' => 'pass123'
];
$resultado = ConexionDB::getInstance()->update("usuarios", $datosModificados, $idEditar); */

#Metodo para eliminar (TRUE si se elimino, FALSE si no):
$idEliminar = 2;
$resultado = ConexionDB::getInstance()->delete("usuarios", $idEliminar);

