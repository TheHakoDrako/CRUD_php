<?php

class controlador_inicio extends controlador_base
{
    #Requerir login
    public $requireLogin = true;

    public function inicio()
    {
        $this->mostrarVista("Inicio", "dashboard");
    }

    public function login()
    {
        echo "Login";
    }

    public function acercaDe()
    {
        $this->mostrarVista("Inicio", "acercaDe");
    }
}
