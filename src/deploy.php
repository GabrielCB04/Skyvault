<!DOCTYPE html>
<html>
  <?php
// Iniciamos la sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirigir al login si no está logueado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}
?>
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

  <style>
    /* Anula estilos Bootstrap para alertas */
    .alert {
      margin-bottom: 0 !important;
    }
    
    /* Estilo de los mensajes de error*/
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
    
    .contact_section .deploy-container {
      position: relative;
      min-height: 400px;
      margin-top: -40px !important;
    }
    
    .contact_section .form_container {
      position: relative;
      z-index: 5;
      padding: 30px;
      border-radius: 10px;
      margin-bottom: 20px;
      margin-top: -20px !important;
    }
    
    .contact_section .message-container {
      min-height: 60px;
      margin-bottom: 10px;
    }
    
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

    .img-box {
      margin-top: 578px !important;
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
        Desplegar desde GitHub
      </h2>
      <p>
        Para un despliegue exitoso, tu repositorio debe tener la siguiente estructura:
        <br>• Carpeta <strong>/src</strong>: Contiene todo el código fuente de tu aplicación
        <br>• Carpeta <strong>/db</strong>: Contiene los scripts SQL o código de la base de datos
      </p>
    </div>
    
    <div class="deploy-container">
      <div class="image-container">
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="form_container">

<?php
// Procesar el formulario al inicio
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Comprobar que el usuario está logueado
    if (!isset($_SESSION['id_usuario']) || empty($_SESSION['id_usuario'])) {
        $errorMsg = "Debes iniciar sesión para poder desplegar un repositorio.";
    } else {
        // Obtén la URL del repositorio de GitHub desde el formulario
        $githubUrl = filter_input(INPUT_POST, 'github_url', FILTER_SANITIZE_URL);
        
        // Obtener datos de la base de datos del formulario
        $dbname_cliente = filter_input(INPUT_POST, 'nombre_db', FILTER_SANITIZE_STRING);
        $db_user = filter_input(INPUT_POST, 'usuario_mysql', FILTER_SANITIZE_STRING);
        $db_pass = $_POST['passwd_mysql']; // No sanitizar para permitir caracteres especiales
        
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
                
                // Limpiar directorio si ya existe
                if (is_dir($repoPath)) {
                    system("rm -rf " . escapeshellarg($repoPath));
                }

                // Ejecuta el comando git clone
                $command = "git clone " . escapeshellarg($githubUrl) . " " . escapeshellarg($repoPath) . " 2>&1";
                $output = [];
                $returnVar = 0;
                exec($command, $output, $returnVar);

                if ($returnVar === 0) {
                    $successMsg = "El repositorio se ha clonado correctamente";
                    
                    // Buscar archivos SQL en la carpeta /db del repositorio
                    $sql_file = "";
                    $db_dir = $repoPath . '/db';
                    if (is_dir($db_dir)) {
                        $sql_files = glob($db_dir . '/*.sql');
                        if (!empty($sql_files)) {
                            $sql_file = $sql_files[0]; // Tomar el primer archivo SQL encontrado
                            error_log("Archivo SQL encontrado: " . $sql_file);
                        } else {
                            error_log("No se encontraron archivos SQL en " . $db_dir);
                        }
                    } else {
                        error_log("Directorio db no encontrado en " . $repoPath);
                    }
                    
                    // Llamar al script externo para crear la base de datos
                    $script_path = __DIR__ . "/crear_db.sh";
                    $cmd = "bash " . escapeshellarg($script_path) . " " . 
                          escapeshellarg($dbname_cliente) . " " . 
                          escapeshellarg($db_user) . " " . 
                          escapeshellarg($db_pass);
                    
                    // Añadir el archivo SQL al comando si existe
                    if (!empty($sql_file)) {
                        $cmd .= " " . escapeshellarg($sql_file);
                        error_log("Ejecutando comando con archivo SQL: " . $cmd);
                    } else {
                        error_log("Ejecutando comando sin archivo SQL: " . $cmd);
                    }
                    
                    // Ejecutar script y capturar salida
                    exec($cmd, $script_output, $script_return);
                    error_log("Resultado del script: " . $script_return . " - Salida: " . implode("\n", $script_output));
                    
                    if ($script_return === 0) {
                        $successMsg .= " y la base de datos ha sido configurada.";
                    } else {
                        $successMsg .= " pero hubo un problema con la base de datos. Contacta al administrador.";
                        error_log("Error en script de DB: " . implode("\n", $script_output));
                    }
                    
                   // Establecer la conexión a la base de datos para Skyvault
                    require_once 'db.php'; 

                    // Registrar el despliegue en la DB
                    try {
                        $conn = getConnection();
                        
                        //Variables a insertar en la base de datos
                        $id_usuario = $_SESSION['id_usuario'];
                        $nombre_repositorio = $repoName;
                        $url_repositorio = $githubUrl;
                        $ruta_repositorio = $repoPath;
                        $puerto = 80; // Puerto por defecto para HTTP
                        $estado = 1; // Estado 1 para indicar que el repositorio está activo
                        $url_publica = "test";
                        
                        // Consulta
                        $sql = "INSERT INTO Despliegues (id_usuario, nombre_proyecto, url_repositorio, ruta_vps, puerto, estado, url_publica) VALUES (?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        
                        if ($stmt->execute([$id_usuario, $nombre_repositorio, $url_repositorio, $ruta_repositorio, $puerto, $estado, $url_publica])) {
                            $id_despliegue = $conn->lastInsertId();
                            $successMsg = "El repositorio se ha clonado y desplegado correctamente. ID de despliegue: $id_despliegue";
                        } else {
                            $successMsg = "El repositorio se ha clonado correctamente, pero hubo un error al registrar el despliegue.";
                            error_log("Error al insertar despliegue en db");
                        }
                        
                    } catch(PDOException $e) {
                        error_log("Error de base de datos: " . $e->getMessage());
                        $successMsg = "El repositorio se ha clonado correctamente, pero hubo un error al registrar el despliegue.";
                    }
                } else {
                    $errorMsg = "Hubo un error al clonar el repositorio. Verifica la URL.";
                    error_log("Error git clone: " . implode("\n", $output));
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
                  <div class="alert alert-success">El repositorio se ha subido correctamente</div>
              <?php endif; ?>
            </div>
            
            <form action="deploy.php" method="POST" id="deployForm">
              <div>
                <input type="text" name="github_url" placeholder="Enlace del repositorio" required />
              </div>

                <div>
                <input type="text" name="nombre_db" placeholder="Nombre de la base de datos MySQL" required />
              </div>

              <div>
                <input type="text" name="usuario_mysql" placeholder="Nombre de usuario de MySQL" required />
              </div>

              <div>
                <input type="text" name="passwd_mysql" placeholder="Contraseña de MySQL" />
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

<?php include 'footer.php'; ?>
</body>

</html>