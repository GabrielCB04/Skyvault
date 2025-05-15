<!DOCTYPE html>
<html>
<?php session_start(); ?>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Skyvault</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <!-- Lottie player script -->
  <script src="js/dotlottie-player.min.js"></script>

  <!-- Add custom styles -->
  <style>
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
    
    /* Estilo moderno para los mensajes de éxito */
    .form_container .alert-success {
      background-color: rgba(76, 175, 80, 0.1) !important;
      border: 4px solid #4CAF50 !important;
      border-radius: 0 !important;
      color: #2E7D32 !important;
      padding: 15px 20px !important;
      margin-bottom: 25px !important;
      font-weight: 500 !important;
      display: flex !important;
      align-items: center !important;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05) !important;
      transition: all 0.3s ease !important;
    }
    .form_container .alert-success:before {
      content: '\f00c' !important;
      font-family: 'FontAwesome' !important;
      margin-right: 15px !important;
      font-size: 18px !important;
    }
    .form_container .alert-success:hover {
      transform: translateY(-2px) !important;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
    }
    
    .transparent-btn {
      background-color: rgba(97, 97, 97, 0.7) !important;
      border: 2px solid #fff;
      color: #fff;
      padding: 10px 25px;
      border-radius: 5px;
      font-weight: bold;
      transition: all 0.3s ease;
      position: relative;
      z-index: 10;
    }

    .transparent-btn:hover {
      background-color: rgba(255, 255, 255, 0.4);
    }
    
    /* Main container style */
    .contact_section .deploy-container {
      position: relative;
      min-height: 400px;
      margin-top: -40px !important;
    }
    
    /* Form container style */
    .contact_section .form_container {
      position: relative;
      z-index: 5;
      padding: 30px;
      border-radius: 10px;
      margin-bottom: 20px;
      margin-top: -20px !important;
    }
    
    /* Message container for alerts */
    .contact_section .message-container {
      min-height: 60px;
      margin-bottom: 10px;
    }
    
    /* Image container style */
    .contact_section .image-container {
      position: absolute;
      top: -50px !important;
      left: 0;
      width: 100%;
      z-index: 1;
      height: 450px;
      overflow: hidden;
    }
    
    .image-container .img-box {
      height: 100%;
    }
    
    .image-container dotlottie-player {
      width: 100%; 
      height: 100%;
    }
  </style>
</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
<?php include 'header.php'; ?>
    <!-- end header section -->
  </div>

<!-- seccion despliegue with overlapping image -->
<section class="contact_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Desplegar desde GitHub
      </h2>
      <p>
        Para un despliegue exitoso, tu repositorio debe tener la siguiente estructura:
        <br>• Carpeta <strong>/src</strong>: Contiene todo el código fuente de tu aplicación
        <br>• Carpeta <strong>/bd</strong>: Contiene los scripts SQL o código de la base de datos
      </p>
    </div>
    
    <!-- Main container with relative positioning -->
    <div class="deploy-container">
      <!-- Image positioned absolutely -->
      <div class="image-container">
        <div class="img-box">
          <dotlottie-player
            src="js/animaciones/animacion_server4.lottie"
            background="transparent"
            speed="1"
            loop
            autoplay>
          </dotlottie-player>
        </div>
      </div>
      <!-- Form with higher z-index -->
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="form_container">

<?php
$errorMsg = "";
$successMsg = "";

// Procesar el formulario al inicio
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // First check if user is logged in
    if (!isset($_SESSION['id_usuario']) || empty($_SESSION['id_usuario'])) {
        $errorMsg = "Debes iniciar sesión para poder desplegar un repositorio.";
    } else {
        // Obtén la URL del repositorio de GitHub desde el formulario
        $githubUrl = filter_input(INPUT_POST, 'github_url', FILTER_SANITIZE_URL);

        // Verifica que la URL sea válida
        if (filter_var($githubUrl, FILTER_VALIDATE_URL)) {
            // Define la carpeta donde se clonará el repositorio
            $directorio_usuario = $_SESSION['id_usuario'];
            $targetDir = '../repos/' . $directorio_usuario . '/';
            
            // Create user directory if it doesn't exist
            if (!is_dir($targetDir)) {
                if (!mkdir($targetDir, 0777, true)) {
                    $errorMsg = "No se pudo crear el directorio del usuario.";
                }
            }

            if (empty($errorMsg)) {
                // Extrae el nombre del repositorio de la URL
                $repoName = basename(parse_url($githubUrl, PHP_URL_PATH), '.git');
                $repoPath = $targetDir . $repoName;

                // Check if repository already exists
                if (is_dir($repoPath)) {
                    $errorMsg = "El repositorio ya existe en tu directorio.";
                } else {
                    // Ejecuta el comando git clone
                    $command = "git clone " . escapeshellarg($githubUrl) . " " . escapeshellarg($repoPath) . " 2>&1";
                    $output = [];
                    $returnVar = 0;
                    exec($command, $output, $returnVar);

                    if ($returnVar === 0) {
                        $successMsg = "El repositorio se ha clonado correctamente";
                        
                        // Establecer la conexión a la base de datos
                        require_once 'db.php'; // Archivo en el mismo directorio que deploy.php
                        
                        // Si no tienes un archivo de conexión, crea la conexión aquí:
                        if (!isset($conn)) {
                            $servername = "localhost";
                            $username = "root"; // Cambia esto por tu usuario de MySQL
                            $password = ""; // Cambia esto por tu contraseña
                            $dbname = "skyvault"; // Cambia esto por el nombre de tu base de datos
                            
                            // Crear conexión
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            
                            // Verificar conexión
                            if ($conn->connect_error) {
                                $errorMsg = "Error de conexión a la base de datos: " . $conn->connect_error;
                                $successMsg = "El repositorio se ha clonado correctamente, pero no se pudo registrar en la base de datos.";
                            }
                        }
                        
                        if (!isset($errorMsg) || empty($errorMsg)) {
                            //Variables a insertar en la base de datos
                            $id_usuario = $_SESSION['id_usuario'];
                            $nombre_repositorio = $repoName;
                            $url_repositorio = $githubUrl;
                            $ruta_repositorio = $repoPath;
                            $puerto = 80; // Puerto por defecto para HTTP
                            $estado = 1; // Estado 1 para indicar que el repositorio está activo
                            $url_publica = "test"; // URL pública inicial, puedes cambiarla según tu lógica
                            
                            // Consulta - Asegúrate de que el nombre de la tabla sea correcto
                            $sql = "INSERT INTO Despliegues (id_usuario, nombre_proyecto, url_repositorio, ruta_vps, puerto, estado, url_publica) VALUES (?, ?, ?, ?, ?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            
                            if ($stmt) {
                                $stmt->bind_param("isssiss", $id_usuario, $nombre_repositorio, $url_repositorio, $ruta_repositorio, $puerto, $estado, $url_publica);
    
                                // Ejecutar la consulta
                                if ($stmt->execute()) {
                                    $id_despliegue = $conn->insert_id; // Obtener el ID del despliegue insertado
                                    $successMsg = "El repositorio se ha clonado y desplegado correctamente. ID de despliegue: $id_despliegue";
                                } else {
                                    // El repositorio se clonó pero hubo un error al registrar en la BD
                                    $successMsg = "El repositorio se ha clonado correctamente, pero hubo un error al registrar el despliegue: " . $stmt->error;
                                    // Podrías guardar el error en un log
                                    error_log("Error al insertar despliegue en BD: " . $stmt->error);
                                }
                                
                                $stmt->close();
                            } else {
                                $successMsg = "El repositorio se ha clonado correctamente, pero hubo un error al preparar la consulta: " . $conn->error;
                                error_log("Error al preparar la consulta: " . $conn->error);
                            }
                            
                            $conn->close();
                        }
                    } else {
                        $errorMsg = "Hubo un error al clonar el repositorio. Verifica la URL.";
                    }
                }
            }
        } else {
            $errorMsg = "La URL proporcionada no es válida.";
        }
    }
}
?>
            
            <div class="message-container">
              <?php if (!empty($errorMsg)): ?>
                  <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
              <?php endif; ?>
              
              <?php if (!empty($successMsg)): ?>
                  <div class="alert alert-success"><?php echo $successMsg; ?></div>
              <?php endif; ?>
            </div>
            
            <form action="deploy.php" method="POST" id="deployForm">
              <div>
                <input type="text" name="github_url" placeholder="Enlace del repositorio" required />
              </div>
              <div class="btn_box text-center">
                <button class="transparent-btn" style="transform: none !important; transition: background-color 0.3s ease !important; position: relative !important;">
                  DESPLEGAR
                </button>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end seccion despliegue -->

  <!-- info section -->
<?php include 'footer.php'; ?>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>

</body>

</html>