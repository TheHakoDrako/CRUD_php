<?php

#Funcion para convertir a parametros:
function convertir_a_parametros($array, $separador = "&", $encerrarCon = "")
{

    return implode(
        $separador,
        array_map(
            function ($key, $value) use ($encerrarCon) {
                return "{$key}={$encerrarCon}{$value}{$encerrarCon}";
            },
            array_keys($array),
            $array
        )
    );
}

#Funcion de rutas:
function ruta($controlador, $accion, $parametros = [])
{
    #Url raiz
    $urlProyecto = "http://localhost/proyecto_libreria/";

    #$parametros['controlador'] = $controlador;
    #$parametros['accion'] = $accion;

    #Convertimos los parametros a un array
    $strParametros = convertir_a_parametros(array_merge(
        [
            "controlador" => $controlador,
            "accion" => $accion
        ],
        $parametros
    ));
    return "{$urlProyecto}?{$strParametros}";
}

#Funcion para retornar un str url:
function crearLink($texto, $configuracion = [])
{
    $controlador = $configuracion['controlador'] ?? 'inicio';
    $accion = $configuracion['accion'] ?? 'inicio';
    $opcionesHtml = $configuracion['opcionesHtml'] ?? [];
    $parametros = $configuracion['parametros'] ?? [];
    $strOpcionesHtml = convertir_a_parametros($opcionesHtml, " ", '"');
    $ruta = ruta($controlador, $accion, $parametros);
    return "<a href='{$ruta}' {$strOpcionesHtml}>{$texto}</a>";
}
