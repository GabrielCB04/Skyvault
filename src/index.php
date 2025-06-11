<!DOCTYPE html>
<html>
<?php session_start(); ?>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link rel="icon" href="images/fevicon.png" type="image/gif" />

  <meta name="description" content="Skyvault - Despliega tu página web en minutos desde GitHub con hosting gratuito en AWS" />
  <meta name="author" content="Skyvault" />

  <title>Skyvault - Hosting y Despliegue Web</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />

  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>



</head>

<body>

  <div class="hero_area">

    <?php include 'header.php' ?>
    
    <section class="slider_section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="detail-box">
              <h1>
                Despliega tu página <br>
                web en minutos
              </h1>
              <p>
                En Skyvault, te ofrecemos hacer un despliegue <br>
                rápido de tu página a través de GitHub.</p>
              <div class="btn-box">
                <a href="deploy.php" class="btn-1">
                  Desplegar
                </a>
                <a href="paginas.php" class="btn-2">
                  Mis páginas
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-lg-10 mx-auto">
                <div class="img-box">
                  <dotlottie-player
                  src="js/animaciones/animacion_server1.lottie"
                  background="transparent"
                  speed="1"
                  style="width: 450px; height: 450px"
                  loop
                  autoplay>
                  </dotlottie-player>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

<!-- service section -->
<section class="service_section layout_padding" style="margin-top: -80px;">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Nuestros Servicios
      </h2>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4">
        <div class="box">
          <div class="img-box">
            <img src="images/s1.png" alt="Hosting Gratuito">
          </div>
          <div class="detail-box">
            <h4>
              Hosting Gratuito
            </h4>
            <p>
              Ofrecemos planes de hosting gratuito con todas las funcionalidades básicas para que puedas iniciar tu proyecto sin costos iniciales.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="box">
          <div class="img-box">
            <img src="images/s2.png" alt="99,99% Uptime AWS">
          </div>
          <div class="detail-box">
            <h4>
              99,99% de Uptime con AWS
            </h4>
            <p>
              Garantizamos un tiempo de actividad del 99,99% gracias a nuestra infraestructura basada en servidores VPS de Amazon Web Services.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="box">
          <div class="img-box">
            <img src="images/s5.png" alt="Backend MySQL">
          </div>
          <div class="detail-box">
            <h4>
              Backend de MySQL
            </h4>
            <p>
              Potentes bases de datos MySQL optimizadas para ofrecer un rendimiento excepcional y seguridad para todas tus aplicaciones web.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about section -->
<section class="about_section layout_padding-bottom">
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              Sobre Nosotros
            </h2>
          </div>
          <p>Somos una pequeña empresa que busca ofrecer el despliegue de páginas web a la nube de forma fácil y accesible. Cuando
            nosotros empezamos en este mundillo del desarrollo, encontrábamos que las únicas opciones valían demasiado para lo que podíamos permitirnos
            o eran incómodas y poco intuitivas. En Skyvault, ofrecemos la manera más rápida de desplegar páginas web a AWS con unos pocos clics.
          </p>
        </div>
      </div>
      <div class="col-md-6">
          <dotlottie-player
          src="js/animaciones/animacion_server2.lottie"
          background="transparent"
          speed="1"
          style="width: 100%; height: 300px"
          loop
          autoplay>
          </dotlottie-player>
      </div>
    </div>
  </div>
</section>


<!-- server section -->
<section class="server_section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <dotlottie-player
          src="js/animaciones/animacion_server3.lottie"
          background="transparent"
          speed="1"
          style="width: 100%; height: 300px"
          loop
          autoplay>
          </dotlottie-player>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2 style="color: white;">
              Manejamos tu página web
            </h2>
          </div>
          <p>
            Una vez despliegues tu página web en Skyvault, te puedes olvidar de manejar cualquier cosa, de eso nos encargamos nosotros. Además,
            ofrecemos compensaciones si el uptime baja del 99%.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- infinite scroll section (sección estética open source que hemos añadido descargada ) -->
<section class="scroll_section">
  <div class="container">
    <div class="tag-list">
      <!-- First row - normal direction -->
      <div class="loop-slider" style="--duration:40000ms; --direction:normal;">
        <div class="inner">
          <div class="tag"><span>#</span> JavaScript</div>
          <div class="tag"><span>#</span> React</div>
          <div class="tag"><span>#</span> Node.js</div>
          <div class="tag"><span>#</span> PHP</div>
          <div class="tag"><span>#</span> Python</div>
          <div class="tag"><span>#</span> HTML</div>
          <div class="tag"><span>#</span> CSS</div>
          <div class="tag"><span>#</span> MySQL</div>
          <div class="tag"><span>#</span> AWS</div>
          <div class="tag"><span>#</span> Docker</div>
          <div class="tag"><span>#</span> DevOps</div>
          <div class="tag"><span>#</span> CI/CD</div>
          <!-- duplicated content for seamless looping -->
          <div class="tag"><span>#</span> JavaScript</div>
          <div class="tag"><span>#</span> React</div>
          <div class="tag"><span>#</span> Node.js</div>
          <div class="tag"><span>#</span> PHP</div>
          <div class="tag"><span>#</span> Python</div>
          <div class="tag"><span>#</span> HTML</div>
          <div class="tag"><span>#</span> CSS</div>
          <div class="tag"><span>#</span> MySQL</div>
          <div class="tag"><span>#</span> AWS</div>
          <div class="tag"><span>#</span> Docker</div>
          <div class="tag"><span>#</span> DevOps</div>
          <div class="tag"><span>#</span> CI/CD</div>
        </div>
      </div>
      
      <!-- Second row - reverse direction -->
      <div class="loop-slider" style="--duration:45000ms; --direction:reverse;">
        <div class="inner">
          <div class="tag"><span>#</span> Vue.js</div>
          <div class="tag"><span>#</span> Angular</div>
          <div class="tag"><span>#</span> TypeScript</div>
          <div class="tag"><span>#</span> Express</div>
          <div class="tag"><span>#</span> Django</div>
          <div class="tag"><span>#</span> PostgreSQL</div>
          <div class="tag"><span>#</span> MongoDB</div>
          <div class="tag"><span>#</span> Redis</div>
          <div class="tag"><span>#</span> Kubernetes</div>
          <div class="tag"><span>#</span> Nginx</div>
          <div class="tag"><span>#</span> Apache</div>
          <div class="tag"><span>#</span> Linux</div>
          <!-- duplicated content for seamless looping -->
          <div class="tag"><span>#</span> Vue.js</div>
          <div class="tag"><span>#</span> Angular</div>
          <div class="tag"><span>#</span> TypeScript</div>
          <div class="tag"><span>#</span> Express</div>
          <div class="tag"><span>#</span> Django</div>
          <div class="tag"><span>#</span> PostgreSQL</div>
          <div class="tag"><span>#</span> MongoDB</div>
          <div class="tag"><span>#</span> Redis</div>
          <div class="tag"><span>#</span> Kubernetes</div>
          <div class="tag"><span>#</span> Nginx</div>
          <div class="tag"><span>#</span> Apache</div>
          <div class="tag"><span>#</span> Linux</div>
        </div>
      </div>
      
      <div class="fade"></div>
    </div>
  </div>
</section>


<!-- Incluir footer -->
<?php include 'footer.php' ?>

</body>
</html>