<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirigir al login si el usuario no está logueado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

require_once 'db.php';

// Variables para los datos de despliegues
$despliegues = [];
$errorMsg = "";

try {
    // Obtenemos la conexión a la base de datos
    $conn = getConnection();
    
    // Obtenemos los despliegues del usuario
    $stmt = $conn->prepare("SELECT id_despliegue, nombre_proyecto, url_repositorio, 
                            puerto, estado, fecha_creacion, url_publica 
                            FROM Despliegues 
                            WHERE id_usuario = :id_usuario 
                            ORDER BY fecha_creacion DESC");
    $stmt->bindParam(":id_usuario", $_SESSION['id_usuario']);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $despliegues = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch(PDOException $e) {
    $errorMsg = "Error en el servidor: " . $e->getMessage();
}

// Variables para establecer propiedades específicas de la página
$bodyClass = "sub_page";


include 'header.php';
?>

<div class="hero_area">
</div>


<section class="about_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Mis Páginas Desplegadas</h2>
    </div>
    
    <div class="row justify-content-center" style="margin-top: -37px; margin-bottom: -5px;">
        <dotlottie-player
          src="js/animaciones/animacion_server6.lottie"
          background="transparent"
          speed="1"
          style="width: 200px; height: 150px; margin: 0 auto;"
          loop
          autoplay>
        </dotlottie-player>
    </div>
    
    <?php if (!empty($errorMsg)): ?>
      <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
    <?php endif; ?>

<?php if (empty($despliegues)): ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="detail-box">
        <p class="text-center">Aún no has desplegado ninguna página web en nuestra plataforma.</p>
        <div class="btn-box text-center mt-4">
          <a href="deploy.php" class="btn-1">Desplegar mi primera página</a>
        </div>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="row">
    <?php foreach ($despliegues as $despliegue): ?>
      <div class="col-md-6">
        <a href="<?php echo htmlspecialchars($despliegue['url_publica']); ?>" target="_blank">
          <div class="detail-box" style="margin-bottom: 25px;">
            <div class="heading_container">
              <h4><?php echo htmlspecialchars($despliegue['nombre_proyecto']); ?></h4>
            </div>
            <div class="info-container">
              <p><strong>Estado:</strong> 
                <span class="<?php echo $despliegue['estado'] ? 'text-success' : 'text-danger'; ?>">
                  <?php echo $despliegue['estado'] ? 'Activo' : 'Inactivo'; ?>
                </span>
              </p>
              <p><strong>Repositorio:</strong> <?php echo htmlspecialchars(basename($despliegue['url_repositorio'])); ?></p>
              <p><strong>Creado:</strong> <?php echo date('d/m/Y', strtotime($despliegue['fecha_creacion'])); ?></p>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>  
<?php endif; ?>
  </div>
</section>

<?php include 'footer.php'; ?>