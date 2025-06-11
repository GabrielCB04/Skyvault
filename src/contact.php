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

<?php include 'footer.php'; ?>



</body>

</html>