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
            while (true) {
                echo "Ingrese el primer nombre: ";
                $dato = trim(fgets(STDIN));
                if (validacionVacio($dato)) {
                    break; 
                }
                echo "El nombre no puede estar vacío. Inténtelo de nuevo.\n";
            }
            $usuario->primer_nombre = $dato;
            
            echo "Ingrese el segundo nombre: ";
            $usuario->segundo_nombre = trim(fgets(STDIN));

            while (true){
                echo "Ingrese el primer apellido: ";
                $dato = trim(fgets(STDIN));
                if (validacionVacio($dato)) {
                    break; 
                }
                echo "El apellido no puede estar vacío. Inténtelo de nuevo.\n";
            }
            $usuario->primer_apellido = $dato;

            echo "Ingrese el segundo apellido: ";
            $usuario->segundo_apellido = trim(fgets(STDIN));

            while (true){
                echo "Ingrese el número de documento: ";
                $dato = trim(fgets(STDIN));
                if (validacionVacio($dato)) {
                    break;
                }
                echo "EL número de documento no puede estar vacío. Inténtelo de nuevo.\n";
            }
            $usuario->n_documento = $dato;

            while (true){
                echo "Ingrese fecha de nacimiento (YYYY-MM-DD): ";
                $dato = trim(fgets(STDIN));
                if (validacionVacio($dato)) {
                    break;
                }
                echo "La fecha de nacimiento no puede estar vacía. Inténtelo de nuevo.\n";
            }
            $usuario->fecha_nacimiento = $dato;

            while (true){
                echo "Ingrese el número de teléfono: ";
                $dato = trim(fgets(STDIN));
                if (validacionVacio($dato)) {
                    break;
                }
                echo "EL número de teléfono no puede estar vacío. Inténtelo de nuevo.\n";
            }
            $usuario->telefono = $dato;

            while (true){
                echo "Ingrese el correo electrónico: ";
                $dato = trim(fgets(STDIN));
                if (validacionVacio($dato)) {
                    break;
                }
                echo "EL correo electrónico no puede estar vacío. Inténtelo de nuevo.\n";
            }
            $usuario->correo_electronico = $dato;

            while (true){
                echo "Ingrese la dirección: ";
                $dato = trim(fgets(STDIN));
                if (validacionVacio($dato)) {
                    break;
                }
                echo "La dirección no puede estar vacía. Inténtelo de nuevo.\n";
            }
            $usuario->direccion = $dato;

            $usuario->crearUsuario();
            echo "Usuario creado con éxito.\n";
            break;

            case 2:
                $usuarios = $usuario->listarUsuarios();
                break;

            case 3:
                $usuario->listarUsuarios();

                while (true){
                    echo "Ingrese el ID del usuario que desea actualizar: ";
                    $dato = trim(fgets(STDIN));
                    if (validacionVacio($dato)) {
                        break;
                    }
                    echo "EL ID no puede estar vacío. Inténtelo de nuevo.\n";
                }
                $usuario->id = $dato;
                
                while (true){
                    echo "Ingrese nuevo primer nombre: ";
                    $dato = trim(fgets(STDIN));
                    if (validacionVacio($dato)) {
                        break;
                    }
                    echo "EL primer nombre no puede estar vacío. Inténtelo de nuevo.\n";
                }
                $usuario->primer_nombre = $dato;
                
                echo "Ingrese nuevo segundo nombre: ";
                $usuario->segundo_nombre = trim(fgets(STDIN));
                
                while (true){
                    echo "Ingrese nuevo primer apellido: ";
                    $dato = trim(fgets(STDIN));
                    if (validacionVacio($dato)) {
                        break;
                    }
                    echo "EL primer apellido no puede estar vacío. Inténtelo de nuevo.\n";
                }
                $usuario->primer_apellido = $dato;
                
                echo "Ingrese nuevo segundo apellido: ";
                $usuario->segundo_apellido = trim(fgets(STDIN));
                
                while (true){
                    echo "Ingrese nuevo número de documento: ";
                    $dato = trim(fgets(STDIN));
                    if (validacionVacio($dato)) {
                        break;
                    }
                    echo "EL número de documento no puede estar vacío. Inténtelo de nuevo.\n";
                }
                $usuario->n_documento = $dato;

                while (true){
                    echo "Ingrese nueva fecha de nacimiento (YYYY-MM-DD): ";
                    $dato = trim(fgets(STDIN));
                    if (validacionVacio($dato)) {
                        break;
                    }
                    echo "La fecha de nacimiento no puede estar vacía. Inténtelo de nuevo.\n";
                }
                $usuario->fecha_nacimiento = $dato;

                while (true){
                    echo "Ingrese nuevo teléfono: ";
                    $dato = trim(fgets(STDIN));
                    if (validacionVacio($dato)) {
                        break;
                    }
                    echo "EL número de teléfono no puede estar vacío. Inténtelo de nuevo.\n";
                }
                $usuario->telefono = $dato;

                while (true){
                    echo "Ingrese nuevo correo electrónico: ";
                    $dato = trim(fgets(STDIN));
                    if (validacionVacio($dato)) {
                        break;
                    }
                    echo "EL correo electrónico no puede estar vacío. Inténtelo de nuevo.\n";
                }
                $usuario->correo_electronico = $dato;
    
                while (true){
                    echo "Ingrese nueva dirección: ";
                    $dato = trim(fgets(STDIN));
                    if (validacionVacio($dato)) {
                        break;
                    }
                    echo "La dirección no puede estar vacía. Inténtelo de nuevo.\n";
                }
                $usuario->direccion = $dato;
    
                $usuario->actualizarUsuario();
                echo "Usuario actualizado con éxito.\n";
                break;

            case 4:
                $usuario->listarUsuarios();

                while (true){
                    echo "Ingrese el ID del usuario que desea eliminar: ";
                    $dato = trim(fgets(STDIN));
                    if (validacionVacio($dato)) {
                        break;
                    }
                    echo "EL ID no puede estar vacío. Inténtelo de nuevo.\n";
                }
                $id = $dato;
                $usuario->eliminarUsuario($id);
                break;    

            case 5:
                echo "Saliendo...\n";
                exit;
    
            default:
                echo "Opción no válida. Intente de nuevo.\n"; 
        }
    }
    