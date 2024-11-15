<?php

Class controlador_libros extends controlador_base{
    public function listadoLibros(){
        $this->mostrarVista("Libros", "listado");
    }

    public function crearLibro(){
        $this->mostrarVista("Libros", "crear");
    }

    public function editarLibro(){
        $this->mostrarVista("Libros", "editar");
    }

    public function eliminarLibro(){
        $this->mostrarVista("Libros", "eliminar");
    }
}