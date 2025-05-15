<?php
// Iniciamos la sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Verificamos si el usuario está logueado
if (!isset($_SESSION['id_usuario'])) {
    // Si no está logueado, redirigimos al login
    header("Location: login.php");
    exit();
}

// Incluimos los archivos de conexión a la base de datos
require_once 'db.php';

// Variables para datos del usuario
$usuario = [];
$numDespliegues = 0;
$errorMsg = "";

try {
    // Obtenemos la conexión a la base de datos
    $conn = getConnection();
    
    // Obtenemos los datos del usuario
    $stmt = $conn->prepare("SELECT id_usuario, correo, fecha_registro FROM Usuarios WHERE id_usuario = :id_usuario");
    $stmt->bindParam(":id_usuario", $_SESSION['id_usuario']);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Contamos los despliegues del usuario
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM Despliegues WHERE id_usuario = :id_usuario");
        $stmt->bindParam(":id_usuario", $_SESSION['id_usuario']);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $numDespliegues = $result['total'];
    } else {
        $errorMsg = "No se pudo encontrar la información del usuario.";
    }
} catch(PDOException $e) {
    $errorMsg = "Error en el servidor: " . $e->getMessage();
}

// Variables para establecer propiedades específicas de la página
$bodyClass = "sub_page";

// Incluimos el header
include 'header.php';
?>

<div class="hero_area">
  <!-- header ya incluido arriba -->
</div>

<!-- about section -->
<section class="about_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Mi Perfil</h2>
    </div>
    
    <?php if (!empty($errorMsg)): ?>
      <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
    <?php endif; ?>
    
    <div class="row">
      <div class="col-md-6">
          <div class="heading_container">
            <h2>Información del Usuario</h2>
          <div class="info-container">
            <p><strong>Correo electrónico:</strong> <?php echo htmlspecialchars($usuario['correo'] ?? ''); ?></p>
            <p><strong>Miembro desde:</strong> <?php echo date('d/m/Y', strtotime($usuario['fecha_registro'] ?? 'now')); ?></p>
            <p><strong>Páginas desplegadas:</strong> <?php echo $numDespliegues; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
          <dotlottie-player
          src="js/animaciones/animacion_server5.lottie"
          background="transparent"
          speed="1"
          style="width: 100%; height: 300px"
          autoplay>
          </dotlottie-player>
      </div>
    </div>
  </div>
</section>
<!-- end about section -->

<?php include 'footer.php'; ?>