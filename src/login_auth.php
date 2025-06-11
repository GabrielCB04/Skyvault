<?php
session_start();

// Si el usuario ya está logueado, redirigimos al dashboard
if (isset($_SESSION['id_usuario'])) {
    header("Location: ../dashboard.php");
    exit();
}

// Variables para mensajes y datos
$correo = "";
$errorMsg = "";

// Incluimos la conexión a la base de datos
require_once 'config.php';

// Procesamos el formulario solo cuando se envía por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar correo electrónico
    if (empty($_POST["correo"])) {
        $errorMsg = "El correo electrónico es obligatorio";
    } else {
        $correo = trim($_POST["correo"]);
    }
    
    // Validar contraseña
    if (empty($_POST["password"])) {
        $errorMsg = "La contraseña es obligatoria";
    } else {
        $password = $_POST["password"];
    }
    
    // Si no hay errores, intentamos autenticar al usuario
    if (empty($errorMsg)) {
        try {
            // Preparamos la consulta para buscar al usuario
            $stmt = $conn->prepare("SELECT id_usuario, correo, passwd FROM usuarios WHERE correo = :correo");
            $stmt->bindParam(":correo", $correo);
            $stmt->execute();
            
            // Verificamos si el usuario existe
            if ($stmt->rowCount() > 0) {
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Verificamos contraseña
                if (password_verify($password, $usuario['passwd'])) {
                    // Guardamos los datos del usuario en la sesión
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
                    $_SESSION['correo'] = $usuario['correo'];
                    
                    // Redirigimos al dashboard
                    header("Location: ../dashboard.php");
                    exit();
                } else {
                    $errorMsg = "Contraseña incorrecta";
                }
            } else {
                $errorMsg = "No existe ninguna cuenta con este correo electrónico";
            }
        } catch(PDOException $e) {
            $errorMsg = "Error en el servidor: " . $e->getMessage();
        }
    }
    
    // Si hay errores, guardamos el mensaje en la sesión y volvemos al formulario
    if (!empty($errorMsg)) {
        $_SESSION['login_error'] = $errorMsg;
        $_SESSION['login_correo'] = $correo; 
        header("Location: ../login.php");
        exit();
    }
} else {
    // Si alguien accede directamente a este archivo sin usar el formulario, redirigimos
    header("Location: ../login.php");
    exit();
}
?>