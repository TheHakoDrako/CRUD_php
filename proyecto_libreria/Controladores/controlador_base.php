<?php

abstract class controlador_base
{
    protected $app;
    protected $plantilla = "base";
    protected $requireLogin = false;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function getRequireLogin()
    {
        return $this->requireLogin;
    }

    public function mostrarVista($modulo, $vista, $variables = [])
    {
        $dirVistas = $this->app->getCarpetaRaiz() . "/Vistas";
        $dirVistaMostrar = "{$dirVistas}/{$modulo}/{$vista}.php";
        $dirPlantilla = "{$dirVistas}/Plantillas/{$this->plantilla}.php";
        # Declarar variables para que estén disponibles en la vista
        foreach ($variables as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include $dirVistaMostrar;
        $contenido = ob_get_clean();
        ob_start();
        include $dirPlantilla;
        $plantilla = ob_get_clean();
        echo $plantilla;
        exit;
    }
}
