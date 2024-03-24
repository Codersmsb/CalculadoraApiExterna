<?php
// CalculadoraController.php

// Se incluye el modelo de la calculadora
require_once(__DIR__ . "/../models/CalculadoraModel.php");

// Definición de la clase CalculadoraController
class CalculadoraController {
    // Método para mostrar la calculadora
    public function index() {
        require_once(__DIR__ . "/../views/calculadora.php");
    }

    // Método para realizar el cálculo
    public function calcular() {
        // Se verifica si se enviaron los datos necesarios
        if(isset($_POST['numero1']) && isset($_POST['numero2']) && isset($_POST['operacion'])) {
            // Se obtienen los datos del formulario
            $numero1 = $_POST['numero1'];
            $numero2 = $_POST['numero2'];
            $operacion = $_POST['operacion'];

            // Se realiza el cálculo utilizando el modelo
            $resultado = CalculadoraModel::calcular($numero1, $numero2, $operacion);

            // Se devuelve el resultado en formato JSON
            echo json_encode($resultado);
        } else {
            // Se devuelve un mensaje de error si faltan datos
            echo json_encode(array('error' => 'Faltan datos'));
        }
    }
}
?>
