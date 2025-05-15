<?php
// Incluimos la clase Database
require_once 'database.php';

/**
 * Función para obtener una conexión a la base de datos
 * 
 * Esta función simplifica el proceso de obtener una conexión
 * en cualquier parte de la aplicación.
 * 
 * @return PDO Objeto de conexión PDO
 */
function getConnection() {
    // Creamos una instancia de la clase Database
    $database = new Database();
    // Llamamos al método connect() y devolvemos la conexión
    return $database->connect();
}
?>