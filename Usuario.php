<?php

require_once 'database.php';

class Usuario
{
    public PDO $conn;
    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $n_documento;
    public $fecha_nacimiento;
    public $telefono;
    public $correo_electronico;
    public $direccion;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }
    
    public function crearUsuario(){   
        try{
           $stm = $this->conn->prepare("INSERT INTO usuarios (
           primer_nombre, 
           segundo_nombre, 
           primer_apellido, 
           segundo_apellido, 
           n_documento, 
           fecha_nacimiento, 
           telefono, 
           correo_electronico, 
           direccion)
           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stm->execute([
                $this->primer_nombre, 
                $this->segundo_nombre, 
                $this->primer_apellido, 
                $this->segundo_apellido, 
                $this->n_documento, 
                $this->fecha_nacimiento, 
                $this->telefono, 
                $this->correo_electronico, 
                $this->direccion]);
        
        } catch (Exception $e) {
            echo "Error al crear: " . $e->getMessage();
        }
    }
    public function listarUsuarios()
    {
        // Lógica para obtener todos los usuarios
    }

    public function obtenerUsuario($id)
    {
        // Lógica para obtener un usuario por ID
    }


    public function actualizarUsuario()
    {
        // Lógica para actualizar un usuario
    }

    public function eliminarUsuario($id)
    {
        // Lógica para eliminar un usuario
    }
}
