<?php

class controlador_usuarios extends controlador_base
{
    #Requerir login
    public $requireLogin = true;

    #Metodo para listar los usuarios:
    public function listadoUsuarios()
    {
        $query = "SELECT * FROM usuarios";
        $filtros = [];
        #Validar si se envió un filtro de búsqueda
        if (isset($_POST['btn_filtrar'])) {
            $condiciones = [];
            $name = $_POST['name'] ?? False;
            $email = $_POST['email'] ?? False;
            $id= $_POST['id'] ?? False;
            #Validaciones de los filtros
            if ($name !== False && !empty($name)) {
                $condiciones[] = "name LIKE '%{$name}%'";
            }
            if ($email !== False && !empty($email)) {
                $condiciones[] = "email LIKE '%{$email}%'";
            }
            if ($id !== False && !empty($id)) {
                $condiciones[] = "ID= '{$id}'";
            }
            #Construir la consulta con los filtros
            if (count($condiciones) > 0) {
                $query .= " WHERE " . implode(' AND ', $condiciones);
            }
            $filtros = [
                'name' => $name,
                'email' => $email,
                'id' => $id
            ];
        }
        $usuarios = ConexionDB::getInstance()->query($query);
        $this->mostrarVista("Usuarios", "listado", ["datos" => $usuarios, "filtros" => $filtros]);
    }

    #Metodo para crear un usuario:
    public function crearUsuario()
    {
        if (isset($_POST['btn_agregar_usuario'])) {
            $name = $_POST['nombreUsuario'] ?? '';
            $email = $_POST['emailUsuario'] ?? '';
            $password = $_POST['passwordUsuario'] ?? '';
            $usuarioGuardado = ConexionDB::getInstance()->insert("usuarios", [
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);
            if ($usuarioGuardado) {
                $this->app->redireccionar("usuarios", "listadoUsuarios");
            } else {
                throw new Exception("Error al guardar el usuario");
                exit();
            }
        }
        $this->mostrarVista("Usuarios", "crear");
    }

    #Metodo para editar un usuario:
    public function editarUsuario()
    {
        #Capturar el id del usuario a editar
        $idUsuario = $_GET['id'];
        #Obtener los datos del usuario
        $sqlUsuario = "SELECT * FROM usuarios WHERE ID ='{$idUsuario}'";
        $resultado = ConexionDB::getInstance()->query($sqlUsuario);
        $usuario = $resultado[0] ?? null;
        if ($usuario === null) {
            throw new Exception("Usuario con la id #{$idUsuario} no encontrado");
        }

        if (isset($_POST['btn_actualizar_usuario'])) {
            $usuarioActualizado = ConexionDB::getInstance()
                ->update("usuarios", $idUsuario, [
                    'name' => $_POST['nombreUsuario'] ?? '',
                    'email' => $_POST['emailUsuario'] ?? '',
                    'password' => $_POST['passwordUsuario'] ?? ''
                ]);
            if ($usuarioActualizado) {
                $this->app->redireccionar("usuarios", "listadoUsuarios");
            } else {
                throw new Exception("Error al actualizar el usuario");
                exit();
            }
        }
        $this->mostrarVista("Usuarios", "editar", ["usuario" => $usuario]);
    }

    #Metodo para eliminar un usuario:
    public function eliminarUsuario()
    {
        $idUsuario = $_GET['id'];
        #Obtener los datos del usuario
        $sqlUsuario = "SELECT * FROM usuarios WHERE ID ='{$idUsuario}'";
        $resultado = ConexionDB::getInstance()->query($sqlUsuario);
        $usuario = $resultado[0] ?? null;
        if ($usuario === null) {
            throw new Exception("Usuario con la id #{$idUsuario} no encontrado");
        }

        # Eliminar usuario si la confirmación es 'si'
        $usuarioEliminado = ConexionDB::getInstance()->delete("usuarios", $idUsuario);
        if ($usuarioEliminado) {
            $this->app->redireccionar("usuarios", "listadoUsuarios");
        } else {
            throw new Exception("Error al eliminar el usuario");
        }
    }
}
