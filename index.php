<?php

require_once 'Usuario.php';

function menuPrincipal() {
    echo "\n=== MENÚ PRINCIPAL ===\n";
    echo "1. Crear usuario\n";
    echo "2. Actualizar usuario\n";
    echo "3. Eliminar usuario\n";
    echo "4. Salir\n";
    echo "Seleccione una opción: ";
}

$usuario = new Usuario();

