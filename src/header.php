<?php
// Inicio de sesión al principio de cada página
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isActive($pageName) {
    $currentPage = basename($_SERVER['PHP_SELF']);
    return ($currentPage == $pageName) ? 'active' : '';
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
    @media (max-width: 991.98px) {
      .navbar-brand {
        margin: 0;
        justify-content: flex-start;
      }
      .logo-container {
        margin-left: 10px;
      }
    }
    
    .dropdown-menu {
      background-color: rgba(40, 43, 56, 0.95);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 0.25rem;
      margin-top: 0.5rem;
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }
    
    .dropdown-item {
      color: #fff;
      padding: 0.75rem 1.5rem;
      transition: all 0.3s ease;
    }
    
    .dropdown-item:hover, .dropdown-item:focus {
      background-color: rgba(255, 255, 255, 0.1);
      color: #4ac4f3; 
    }
    
    .dropdown-divider {
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      margin: 0.5rem 0;
    }
    
    .nav-item.dropdown .dropdown-toggle::after {
      border-top-color: #ffffff;
      margin-left: 0.5rem;
    }
    
    .nav-item.dropdown:hover .dropdown-toggle::after {
      border-top-color: #4ac4f3;
    }
    
    @media (min-width: 992px) {
      .nav-item.dropdown:hover .dropdown-menu {
        display: block;
      }
    }
  </style>
  
  <?php

  ?>
</head>

<body <?php echo (isset($bodyClass)) ? 'class="'.$bodyClass.'"' : ''; ?>>

  <div class="hero_area">
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <div class="logo-container">
              <img src="images/fevicon.png" alt="Logo" class="logo-image">
              <span>Skyvault</span>
            </div>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item <?php echo isActive('index.php'); ?>">
                <a class="nav-link" href="index.php">Inicio<?php if(isActive('index.php')) echo ' <span class="sr-only">(current)</span>'; ?></a>
              </li>
              <li class="nav-item <?php echo isActive('deploy.php'); ?>">
                <a class="nav-link" href="deploy.php">Desplegar<?php if(isActive('deploy.php')) echo ' <span class="sr-only">(current)</span>'; ?></a>
              </li>
              <li class="nav-item <?php echo isActive('paginas.php'); ?>">
                <a class="nav-link" href="paginas.php">Mis páginas<?php if(isActive('paginas.php')) echo ' <span class="sr-only">(current)</span>'; ?></a>
              </li>
              
              <?php if (!isset($_SESSION['id_usuario'])): ?>
              <li class="nav-item <?php echo isActive('contact.php'); ?>">
                <a class="nav-link" href="contact.php">Contáctanos<?php if(isActive('contact.php')) echo ' <span class="sr-only">(current)</span>'; ?></a>
              </li>
              <li class="nav-item <?php echo isActive('login.php'); ?>">
                <a class="nav-link" href="login.php">Iniciar Sesión<?php if(isActive('login.php')) echo ' <span class="sr-only">(current)</span>'; ?></a>
              </li>
              <?php else: ?>
              <!-- Si el usuario está logueado mostramos menú de usuario -->
              <li class="nav-item <?php echo isActive('contact.php'); ?>">
                <a class="nav-link" href="contact.php">Contáctanos<?php if(isActive('contact.php')) echo ' <span class="sr-only">(current)</span>'; ?></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Mi Cuenta
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="perfil.php">Mi Perfil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
                </div>
              </li>
              <?php endif; ?>
            </ul>
          </div>
        </nav>
      </div>
    </header>
