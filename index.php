<?php

require_once 'Usuario.php';

function menuPrincipal() {
    echo "\n=== MENÚ PRINCIPAL ===\n";
    echo "1. Crear usuario\n";
    echo "2. Listar usuarios\n";
    echo "3. Actualizar usuario\n";
    echo "4. Eliminar usuario\n";
    echo "5. Salir\n";
    echo "Seleccione una opción: ";
}

$usuario = new Usuario();

while (true) {
    menuPrincipal();
    $option = trim(fgets(STDIN));

    switch ($option) {
        case 1:
            echo "Ingrese primer nombre: ";
            $usuario->primer_nombre = trim(fgets(STDIN));

            echo "Ingrese segundo nombre: ";
            $usuario->segundo_nombre = trim(fgets(STDIN));

            echo "Ingrese primer apellido: ";
            $usuario->primer_apellido = trim(fgets(STDIN));

            echo "Ingrese segundo apellido: ";
            $usuario->segundo_apellido = trim(fgets(STDIN));

            echo "Ingrese número de documento: ";
            $usuario->n_documento = trim(fgets(STDIN));

            echo "Ingrese fecha de nacimiento (YYYY-MM-DD): ";
            $usuario->fecha_nacimiento = trim(fgets(STDIN));

            echo "Ingrese teléfono: ";
            $usuario->telefono = trim(fgets(STDIN));

            echo "Ingrese correo electrónico: ";
            $usuario->correo_electronico = trim(fgets(STDIN));

            echo "Ingrese dirección: ";
            $usuario->direccion = trim(fgets(STDIN));

            $usuario->crearUsuario();
            echo "Usuario creado con éxito.\n";
            break;

            case 5:
                echo "Saliendo...\n";
                exit;
    
            default:
                echo "Opción no válida. Intente de nuevo.\n"; 
        }
    }
    