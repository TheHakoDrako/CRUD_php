<?php

class controlador_login extends controlador_base
{
    #Metodo login:
    public function login()
    {
        # Validar que post contiene la posición btn_login
        if (isset($_POST['btn_login'])) {
            # La condición solo se cumple cuando se presiona el botón.
            $email = $_POST['emailUsuario'] ?? '';
            $password = $_POST['passwordUsuario'] ?? '';
            $sql = "SELECT * FROM usuarios WHERE "
                . "email='{$email}' "
                . " AND password='{$password}'";
            $resultado = ConexionDB::getInstance()->query($sql);

            $usuarioEncontrado = $resultado[0] ?? false;

            # Condición que valida las credenciales
            if ($usuarioEncontrado !== false && !is_null($usuarioEncontrado)) {
                $_SESSION['logueado'] = true;
                $_SESSION['id_usuario'] = $usuarioEncontrado['ID'];
                $_SESSION['nombre_usuario'] = $usuarioEncontrado['name'];
                $_SESSION['email'] = $usuarioEncontrado['email'];
                # Por seguridad no se guarda la contraseña en la sesión.
                $this->app->redireccionar("inicio", "inicio");
            }
        }
        $this->plantilla = "vacia";
        $this->mostrarVista("acceso", "login");
    }

    #Metodo logout:
    public function logout()
    {
        session_destroy();
        $this->app->redireccionar("login", "login");
    }
}
