<?php
// Incluir el archivo de configuración
require_once 'config.php';

/**
 * Clase Database
 * Esta clase maneja la conexión a la base de datos MySQL
 */
class Database {
    // Variable privada para almacenar la conexión
    private $conn;
    
    /**
     * Método para conectar a la base de datos
     * @return PDO Objeto de conexión PDO
     */
    public function connect() {
        // Inicializamos la conexión como nula
        $this->conn = null;
        
        try {
            // Creamos una nueva conexión PDO usando las constantes definidas en config.php
            $this->conn = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
                DB_USER,
                DB_PASS
            );
            
            // Configuramos PDO para que lance excepciones en caso de error
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Configuramos la codificación UTF-8
            $this->conn->exec("set names utf8");
            
        } catch(PDOException $e) {
            // Si hay un error, mostrar mensaje
            echo "Error de conexión: " . $e->getMessage();
        }
        
        // Devolvemos la conexión
        return $this->conn;
    }
}
?>