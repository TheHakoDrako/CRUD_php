<?php

class Aplicacion
{
    private $nombreControlador;
    private $nombreAccion;
    private $carpetaRaiz;

    #Instancia del controlador
    private $controlador;

    public function __construct($carpetaRaiz)
    {
        $this->carpetaRaiz = $carpetaRaiz;
    }

    #Metodo para redireccionar al controlador
    public function redireccionar($controlador, $accion, $parametros = [])
    {
        $url = ruta($controlador, $accion, $parametros);
        header('Location: ' . $url);
        exit();
    }

    #Metodo para cargar el controlador
    public function cargarControlador()
    {
        $nombreRealControlador = "controlador_" . $this->nombreControlador;
        $dirControlador = "{$this->carpetaRaiz}/Controladores/{$nombreRealControlador}.php";

        #Validar si el archivo existe
        if (!realpath($dirControlador)) {
            throw new Exception("Controlador {$dirControlador} no encontrado");
        }

        #Importamos:
        require_once "{$this->carpetaRaiz}/Clases/conexion_db.php";
        require_once "{$this->carpetaRaiz}/Controladores/controlador_base.php";
        require_once "{$this->carpetaRaiz}/Utilidades/funciones.php";
        require_once $dirControlador;

        #Validamos si la clase existe
        if (!class_exists($nombreRealControlador)) {
            throw new Exception("Clase {$nombreRealControlador} no encontrada");
        }

        $this->controlador = new $nombreRealControlador($this);
        
        #Validar si el controlador requiere login
        if ($this->controlador->getRequireLogin() && !isset($_SESSION['logueado'])) {
            $this->redireccionar('login', 'login');
        }
    }

    public function cargarAplicacion()
    {
        #Inicializar la sesion
        session_start();

        $this->nombreControlador = $_GET['controlador'] ?? 'inicio';
        $this->nombreAccion = $_GET['accion'] ?? 'inicio';
        $this->cargarControlador();

        #Validar que el controlador tenga la accion
        if (!method_exists($this->controlador, $this->nombreAccion)) {
            throw new Exception("Accion {$this->nombreAccion} no encontrada en el controlador {$this->nombreControlador}");
        }

        call_user_func_array([$this->controlador, $this->nombreAccion], []);
    }

    public function getCarpetaRaiz()
    {
        return $this->carpetaRaiz;
    }
}
