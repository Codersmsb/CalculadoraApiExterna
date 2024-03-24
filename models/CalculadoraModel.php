<?php
// CalculadoraModel.php

// Definición de la clase CalculadoraModel
class CalculadoraModel {
    // Método estático para realizar el cálculo utilizando una API externa
    public static function calcular($numero1, $numero2, $operacion) {
        // Se construye la URL para la API de cálculo
        $url = "https://api.mathjs.org/v4/?expr=" . urlencode($numero1 . $operacion . $numero2);
        // Se obtiene el resultado de la API
        $resultado = file_get_contents($url);
        return $resultado; // Se devuelve el resultado
    }
}
?>
