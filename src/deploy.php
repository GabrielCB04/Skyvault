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

    .img-box {
      margin-top: 578px !important;
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
// Procesar el formulario al inicio
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // First check if user is logged in
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
                        
                        // Crear la base de datos
                        // En XAMPP, típicamente la contraseña está vacía para root
                        $admin_conn = new mysqli("localhost", "root", "", "");

                        // Verificar conexión
                        if ($admin_conn->connect_error) {
                            error_log("Error conectando como admin: " . $admin_conn->connect_error);
                            $successMsg = "Repositorio clonado pero hubo un error con la base de datos.";
                        } else {
                            // Crear base de datos
                            $sql_create_db = "CREATE DATABASE IF NOT EXISTS `" . $admin_conn->real_escape_string($dbname_cliente) . "` 
                                DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci"; 

                            if ($admin_conn->query($sql_create_db) === TRUE) {
                                // Crear usuario específico para esta base de datos
                                $sql_create_user = "CREATE USER IF NOT EXISTS '" . $admin_conn->real_escape_string($db_user) . 
                                                "'@'localhost' IDENTIFIED BY '" . $admin_conn->real_escape_string($db_pass) . "'";
                                $admin_conn->query($sql_create_user);
                                
                                $sql_grant = "GRANT ALL PRIVILEGES ON `" . $admin_conn->real_escape_string($dbname_cliente) . 
                                            "`.* TO '" . $admin_conn->real_escape_string($db_user) . "'@'localhost'";
                                $admin_conn->query($sql_grant);
                                $admin_conn->query("FLUSH PRIVILEGES");
                                
                                $successMsg .= " y se ha creado la base de datos correctamente.";

                                // Buscar archivos SQL en la carpeta /bd del repositorio
                                $bd_dir = $repoPath . '/bd';
                                if (is_dir($bd_dir)) {
                                    $sql_files = glob($bd_dir . '/*.sql');
                                    
                                    if (!empty($sql_files)) {
                                        // Tomar el primer archivo SQL encontrado
                                        $sql_file = $sql_files[0];
                                        
                                        // Importar el archivo SQL directamente
                                        $import_result = importarSQL($sql_file, $dbname_cliente, $db_user, $db_pass);
                                        
                                        if ($import_result === true) {
                                            $successMsg .= " Base de datos importada correctamente.";
                                        } else {
                                            $successMsg .= " Error al importar la base de datos: " . $import_result;
                                        }
                                    } else {
                                        $successMsg .= " No se encontraron archivos SQL para importar.";
                                    }
                                } else {
                                    $successMsg .= " No se encontró directorio de bases de datos.";
                                }
                            } else {
                                error_log("Error creando base de datos: " . $admin_conn->error);
                                $successMsg = "Repositorio clonado pero hubo un error creando la base de datos.";
                            }
                            $admin_conn->close();
                        }
                        
                        // Establecer la conexión a la base de datos para Skyvault
                        require_once 'db.php'; // Archivo en el mismo directorio que deploy.php
                        
                        // Si no tienes un archivo de conexión o falló, crea la conexión aquí:
                        if (!isset($conn)) {
                            $servername = "localhost";
                            $username = "root"; 
                            $password = ""; // Sin contraseña para XAMPP típicamente
                            $dbname = "skyvault"; 
                            
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

/**
 * Importa un archivo SQL directamente
 * @param string $file_path Ruta completa al archivo SQL
 * @param string $db_name Nombre de la base de datos
 * @param string $db_user Usuario de la base de datos
 * @param string $db_pass Contraseña de la base de datos
 * @return mixed True si la importación fue exitosa, mensaje de error si falló
 */
function importarSQL($file_path, $db_name, $db_user, $db_pass) {
    try {
        // Leer el contenido del archivo SQL
        $sql_content = file_get_contents($file_path);
        if ($sql_content === false) {
            return "No se pudo leer el archivo SQL";
        }
        
        // Conectar a la base de datos
        $conn = new mysqli("localhost", $db_user, $db_pass, $db_name);
        if ($conn->connect_error) {
            return "Error de conexión: " . $conn->connect_error;
        }
        
        // Aumentar el tiempo máximo de ejecución y el tamaño máximo de paquete
        $conn->query("SET GLOBAL max_allowed_packet=16777216"); // 16M
        $conn->query("SET GLOBAL net_read_timeout=300"); // 5 minutos
        
        // Mejorar el manejo de caracteres
        $conn->set_charset("utf8mb4");
        
        // Dividir el contenido en consultas individuales
        $queries = explode(';', $sql_content);
        
        // Ejecutar cada consulta
        foreach ($queries as $query) {
            $query = trim($query);
            if (!empty($query)) {
                $result = $conn->query($query);
                if ($result === false) {
                    error_log("Error ejecutando consulta: " . $conn->error);
                    error_log("Consulta: " . substr($query, 0, 150) . "...");
                }
            }
        }
        
        $conn->close();
        return true;
    } catch (Exception $e) {
        error_log("Excepción importando SQL: " . $e->getMessage());
        return "Error: " . $e->getMessage();
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
<!-- end seccion despliegue -->

  <!-- info section -->
<?php include 'footer.php'; ?>
</body>

</html>