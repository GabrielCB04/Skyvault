<?php
session_start();

// Incluimos los archivos de conexión a la base de datos
require_once 'db.php';

$nombre = "";
$apellidos = "";
$correo = "";
$errorMsg = "";

// Si el usuario ya está logueado, redirigimos al dashboard
if (isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}

// Procesamos el formulario cuando se envía por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar nombre
    if (empty($_POST["nombre"])) {
        $errorMsg = "El nombre es obligatorio";
    } else {
        $nombre = trim($_POST["nombre"]);
    }
    
    // Validar apellidos
    if (empty($_POST["apellidos"])) {
        $errorMsg = "Los apellidos son obligatorios";
    } else {
        $apellidos = trim($_POST["apellidos"]);
    }
    
    // Validar correo electrónico
    if (empty($_POST["correo"])) {
        $errorMsg = "El correo electrónico es obligatorio";
    } else {
        $correo = trim($_POST["correo"]);
        // Verificar formato de correo válido
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errorMsg = "Formato de correo electrónico inválido";
        }
    }
    
    // Validar contraseña
    if (empty($_POST["password"])) {
        $errorMsg = "La contraseña es obligatoria";
    } else {
        $password = $_POST["password"];
        // Verificar longitud mínima
        if (strlen($password) < 8) {
            $errorMsg = "La contraseña debe tener al menos 8 caracteres";
        }
    }
    
    // Validar confirmación contraseña
    if (empty($_POST["confirm_password"])) {
        $errorMsg = "Debes confirmar tu contraseña";
    } else {
        $confirm_password = $_POST["confirm_password"];
        if ($password !== $confirm_password) {
            $errorMsg = "Las contraseñas no coinciden";
        }
    }
    
    // Si no hay errores, registramos al usuario
    if (empty($errorMsg)) {
        try {
            // Obtenemos la conexión a la base de datos
            $conn = getConnection();
            
            // Verificar si el correo ya está registrado
            $stmt = $conn->prepare("SELECT id_usuario FROM Usuarios WHERE correo = :correo");
            $stmt->bindParam(":correo", $correo);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $errorMsg = "Este correo electrónico ya está registrado";
            } else {
                // Crear hash de la contraseña
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                // Insertar el nuevo usuario
                $stmt = $conn->prepare("INSERT INTO Usuarios (correo, passwd) VALUES (:correo, :passwd)");
                $stmt->bindParam(":correo", $correo);
                $stmt->bindParam(":passwd", $hashedPassword);
                
                if ($stmt->execute()) {
                    // Obtener el ID del usuario recién creado
                    $userId = $conn->lastInsertId();
                    
                    // Iniciar sesión automáticamente
                    $_SESSION['id_usuario'] = $userId;
                    $_SESSION['correo'] = $correo;
                    
                    // Redirigir al dashboard
                    header("Location: index.php");
                    exit();
                } else {
                    $errorMsg = "Error al registrar el usuario. Inténtalo de nuevo.";
                }
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

  <title>Skyvault</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
  <script src="js/dotlottie-player.min.js"></script>

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
    /* Estilo de los mensajes de error */
    .alert-danger {
      background-color: rgba(255, 76, 76, 0.1);
      border: 4px solid #ff4c4c;
      border-radius: 0;
      color: #d93025;
      padding: 15px 20px;
      margin-bottom: 25px;
      font-weight: 500;
      display: flex;
      align-items: center;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
    }
    .alert-danger:before {
      content: '\f071';
      font-family: 'FontAwesome';
      margin-right: 15px;
      font-size: 18px;
    }
    .alert-danger:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
        Registrarse
      </h2>
    </div>
    <div class="row">
      <div class="col-md-8 col-lg-6 mx-auto">
        <div class="form_container">
          <?php if (!empty($errorMsg)): ?>
              <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
          <?php endif; ?>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div>
              <input type="text" name="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($nombre); ?>" required />
            </div>
            <div>
              <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo htmlspecialchars($apellidos); ?>" required />
            </div>
            <div>
              <input type="email" name="correo" placeholder="Correo Electrónico" value="<?php echo htmlspecialchars($correo); ?>" required />
            </div>
            <div>
              <input type="password" name="password" placeholder="Contraseña" required />
              <small class="text-muted">La contraseña debe tener al menos 8 caracteres</small>
            </div>
            <div>
              <input type="password" name="confirm_password" placeholder="Confirmar Contraseña" required />
            </div>
            <div class="btn_box ">
              <button type="submit">
                REGISTRARSE
              </button>
            </div>
          </form>
          <div class="text-center mt-4">
            <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>

</body>

</html>