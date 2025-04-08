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
        
        $query = "SELECT * FROM usuarios";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    public function obtenerUsuario($id)
    {
        // Lógica para obtener un usuario por ID

        $query = "SELECT * FROM usuarios WHERE n_documento = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;


    }


    public function actualizarUsuario()
    {
        try {
            $stm = $this->conn->prepare("UPDATE usuarios SET 
                primer_nombre = ?, 
                segundo_nombre = ?, 
                primer_apellido = ?, 
                segundo_apellido = ?, 
                fecha_nacimiento = ?, 
                telefono = ?, 
                correo_electronico = ?, 
                direccion = ?
                WHERE n_documento = ?");
    
            $stm->execute([
                $this->primer_nombre,
                $this->segundo_nombre,
                $this->primer_apellido,
                $this->segundo_apellido,
                $this->fecha_nacimiento,
                $this->telefono,
                $this->correo_electronico,
                $this->direccion,
                $this->n_documento
            ]);

        } catch (Exception $e) {
            echo "Error al actualizar: " . $e->getMessage() . "\n";
        }
    }

    public function eliminarUsuario($id)
    {
        // Lógica para eliminar un usuario
    }
}
