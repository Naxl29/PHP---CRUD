<?php

require_once 'database.php';

class Usuario
{
    public PDO $conn;
    public $id;
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
        $sql = "SELECT 
        u.id,
        u.primer_nombre,
        u.segundo_nombre,
        u.primer_apellido,
        u.segundo_apellido,
        u.telefono,
        TRUNCATE(DATEDIFF(CURRENT_DATE, STR_TO_DATE(u.fecha_nacimiento, '%Y-%m-%d')) / 365.25, 0) AS edad
        FROM usuarios AS u";

        $resultado = $this->conn->prepare($sql);
        $resultado->execute();
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($usuarios as $usuario) {
            $id = $usuario["id"];
            $nombre_completo = $usuario["primer_nombre"] ." ". $usuario["segundo_nombre"] ." ". $usuario["primer_apellido"] ." ". $usuario["segundo_apellido"];
            $edad = $usuario["edad"];
            $telefono = $usuario["telefono"];
        
            echo "ID: $id | Nombre completo: $nombre_completo | Edad: $edad años | Teléfono: $telefono\n";
    }
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
                n_documento = ?,
                fecha_nacimiento = ?, 
                telefono = ?, 
                correo_electronico = ?, 
                direccion = ?
                WHERE id = ?");
    
            $stm->execute([
                $this->primer_nombre,
                $this->segundo_nombre,
                $this->primer_apellido,
                $this->segundo_apellido,
                $this->n_documento,
                $this->fecha_nacimiento,
                $this->telefono,
                $this->correo_electronico,
                $this->direccion,
                $this->id
            ]);

        } catch (Exception $e) {
            echo "Error al actualizar: " . $e->getMessage() . "\n";
        }
    }

    public function eliminarUsuario($id)
    {
        try {
            $query = "DELETE FROM usuarios WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            echo "Usuario eliminado con éxito.\n";
        } catch (Exception $e) {
            echo "Error al eliminar: " . $e->getMessage() . "\n";
        } 
    }
}

    function validacionVacio($dato) {
        return !empty(trim($dato));
    }
