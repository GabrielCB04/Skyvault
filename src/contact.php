<!DOCTYPE html>
<html>

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

  <script src="js/dotlottie-player.min.js"></script>

  <!-- Add this new style to center the logo and title -->
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
    /* Ensure the navbar is properly aligned for responsive design */
    @media (max-width: 991.98px) {
      .navbar-brand {
        margin: 0;
        justify-content: flex-start;
      }
      .logo-container {
        margin-left: 10px;
      }
    }
  </style>

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
   <?php include 'header.php'; ?>
    <!-- end header section -->
  </div>

  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Pongámonos En Contacto
        </h2>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" placeholder="Nombre" />
              </div>
              <div>
                <input type="email" placeholder="Correo Electrónico" />
              </div>
              <div>
                <input type="text" placeholder="Teléfono" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Mensaje" />
              </div>
              <div class="btn_box ">
                <button>
                  ENVIAR
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

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