<?php
// Se incluye el archivo del controlador de la calculadora
require_once("controllers/CalculadoraController.php");

// Se determina la acción solicitada, por defecto es 'index'
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Se instancia el controlador de la calculadora
$controller = new CalculadoraController();

// Se ejecuta la acción correspondiente
switch ($action) {
    case 'calcular':
        $controller->calcular(); // Acción para calcular
        break;
    default:
        $controller->index(); // Acción por defecto, mostrar la calculadora
        break;
}
?>
