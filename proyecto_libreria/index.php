<?php

require_once './Clases/aplicacion.php';

/* require_once './Controladores/controlador_inicial.php';

$controlador = $_GET['controlador'] ?? 'inicio';

if ($controlador === 'inicio'){
    require_once './Controladores/controlador_inicial.php';
} else if ($controlador === 'usuarios'){
    require_once './Controladores/controlador_usuarios.php';
} else{
    echo "Controlador no encontrado";
} */

$aplicacion = new Aplicacion(__DIR__);
$aplicacion->cargarAplicacion();