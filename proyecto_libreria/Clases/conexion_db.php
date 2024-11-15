<?php
#Jeronimo Ramírez Mejía.
#Clase para la conexión a la base de datos:
class ConexionDB{
    private $host;
    private $database;
    private $user;
    private $password;

    #Objeto de la conexion:
    private $conexion;

    #Conexión a la base de datos (private para que no se pueda instanciar la clase):
    private function __construct(){
        $this->host = "localhost";
        $this->database = "proyecto_libreria";
        $this->user = "root";
        $this->password = "THD123fj19.ms"; #Contraseña de la base de datos
    }

    #Patrón Singleton:
    public static function getInstance(){
        static $instance = null;
        if (null === $instance) {
            $instance = new ConexionDB();
            #Conectar a la base de datos:
            $instance->conectar();
        }
        return $instance;
    }

    #Conectar a la base de datos:
    public function conectar(){
        try {
            $conexionString = "mysql:host=$this->host;dbname=$this->database;charset=utf8";
            $this->conexion = new PDO($conexionString, $this->user, $this->password);
            if (!$this->conexion) {
                echo "Error al conectar a la base de datos";
                exit();
            }
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    #Ejecutar una consulta:
    public function query($consulta){
        $consultaEjecutada = $this->conexion->query($consulta, PDO::FETCH_ASSOC);
        $resultado = $consultaEjecutada->fetchAll();
        return $resultado;
    }

    #Insertar un registro:
    public function insert($tabla, $datos){
        $columnas = implode(", ", array_keys($datos));
        $valores = array_values($datos);
        $tokens = implode(", ", array_fill(0, count($datos), "?"));
        $sql = "INSERT INTO $tabla ({$columnas}) VALUES ({$tokens})";
        $consultaEjecutada = $this->conexion->prepare($sql);
        $resultado = $consultaEjecutada->execute($valores);
        return $resultado;
    }

    #Editar un registro:
    public function update($tabla, $id, $datos){
        $columnas = array_keys($datos);
        $colsActualizar = array_map(function ($nombreColumna){
            return "{$nombreColumna}=:{$nombreColumna}";
        }, $columnas);
        $sql = "UPDATE {$tabla} SET " . implode(', ', $colsActualizar) . " WHERE id=:id";
        $consultaEjecutada = $this->conexion->prepare($sql);
        #Agregar el id al array de datos: 
        $datos['id'] = $id;
        $resultado = $consultaEjecutada->execute($datos);
        return $resultado;
    }

    #Eliminar un registro:
    public function delete($tabla, $id){
        $sql = "DELETE FROM {$tabla} WHERE id=:id";
        $consultaEjecutada = $this->conexion->prepare($sql);
        $resultado = $consultaEjecutada->execute(['id' => $id]);
        return $resultado;
    }
}