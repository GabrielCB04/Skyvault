<?php
session_start();

// Incluimos los archivos de conexión a la base de datos
require_once 'db.php';

$correo = "";
$errorMsg = "";

// Si el usuario ya está logueado, redirigimos al dashboard
if (isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}

// Procesamos el formulario cuando se envía por POST
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
            // Obtenemos conexión a la base de datos
            $conn = getConnection();
            
            // Preparamos la consulta para buscar al usuario
            $stmt = $conn->prepare("SELECT id_usuario, correo, passwd FROM Usuarios WHERE correo = :correo");
            $stmt->bindParam(":correo", $correo);
            $stmt->execute();
            
            // Verificamos si el usuario existe
            if ($stmt->rowCount() > 0) {
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Verificamos la contraseña
                if (password_verify($password, $usuario['passwd'])) {
                    // Guardamos los datos del usuario en la sesión
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
                    $_SESSION['correo'] = $usuario['correo'];
                    
                    // Redirigimos al dashboard
                    header("Location: index.php");
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
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Skyvault</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
  <script src="js/dotlottie-player.min.js"></script>

  <!-- Nuevo estilo centro del logo y título -->
  <style>
    .navbar-brand {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      margin: 0 auto;
      padding-left: 15px;
    }
    .logo-container {
      display: flex;
      align-items: center;
      margin-left: 20px;
    }
    .logo-image {
      width: 40px;
      height: 40px;
      margin-right: 15px;
    }
    /* navbar alineado con el diseño responsive */
    @media (max-width: 991.98px) {
      .navbar-brand {
        margin: 0;
        justify-content: flex-start;
      }
      .logo-container {
        margin-left: 10px;
      }
    }
    
    /* Anula estilos Bootstrap para alertas */
    .alert {
      margin-bottom: 0 !important;
    }
    
    /* Estilo moderno para los mensajes de error */
    .form_container .alert-danger {
      background-color: rgba(255, 76, 76, 0.1) !important;
      border: 4px solid #ff4c4c !important;
      border-radius: 0 !important;
      color: #d93025 !important;
      padding: 15px 20px !important;
      margin-bottom: 25px !important;
      font-weight: 500 !important;
      display: flex !important;
      align-items: center !important;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05) !important;
      transition: all 0.3s ease !important;
    }
    .form_container .alert-danger:before {
      content: '\f071' !important;
      font-family: 'FontAwesome' !important;
      margin-right: 15px !important;
      font-size: 18px !important;
    }
    .form_container .alert-danger:hover {
      transform: translateY(-2px) !important;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
    }
    
    .message-container {
      min-height: 60px;
      margin-bottom: 10px;
    }
    
    .contact_section .form_container {
      margin-top: -20px !important;
    }
  </style>

</head>

<body class="sub_page">

  <div class="hero_area">
  <?php include 'header.php'; ?>
  </div>

<section class="contact_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Iniciar Sesión
      </h2>
    </div>
    <div class="row">
      <div class="col-md-8 col-lg-6 mx-auto">
        <div class="form_container">
          <div class="message-container">
            <?php if (!empty($errorMsg)): ?>
                <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
            <?php endif; ?>
          </div>
          
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div>
              <input type="email" name="correo" placeholder="Correo Electrónico" value="<?php echo htmlspecialchars($correo); ?>" required />
            </div>
            <div>
              <input type="password" name="password" placeholder="Contraseña" required />
            </div>
            <div class="btn_box ">
              <button type="submit">
                INICIAR SESIÓN
              </button>
            </div>
          </form>
          <div class="text-center mt-4">
            <p>¿No tienes una cuenta? <a href="register.php">Regístrate</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>

</body>
</html>