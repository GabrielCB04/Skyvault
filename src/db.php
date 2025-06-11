<?php
// Incluimos la clase Database
require_once 'database.php';


//Función para obtener una conexión a la base de datos

function getConnection() {
    // Creamos una instancia de la clase Database
    $database = new Database();
    // Llamamos al método connect() y devolvemos la conexión
    return $database->connect();
}
?>