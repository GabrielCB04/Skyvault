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

  <script src="js/dotlottie-player.min.js"></script>

  <!-- Add page-specific styles only -->
  <style>
    /* Estilos para el infinite scroll */
    .scroll_section {
      background-color: rgba(10, 10, 26, 0.95);
      padding: 0;
      margin: 0;
      width: 100vw;
      max-width: 100%;
      overflow-x: hidden;
    }
    
    .scroll_section .container {
      width: 100%;
      max-width: 100%;
      padding: 0;
      margin: 0;
    }
    
    .tag-list {
      width: 100vw;
      max-width: 100%;
      display: flex;
      flex-shrink: 0;
      flex-direction: column;
      gap: 1rem 0;
      position: relative;
      padding: 1rem 0;
      overflow: hidden;
    }
    
    .loop-slider .inner {
      display: flex;
      width: fit-content;
      animation-name: loop;
      animation-timing-function: linear;
      animation-iteration-count: infinite;
      animation-direction: var(--direction);
      animation-duration: var(--duration);
    }
    
    .tag {
      display: flex;
      align-items: center;
      gap: 0 0.2rem;
      color: #e2e8f0;
      font-size: 0.9rem;
      background-color: #334155;
      border-radius: 0.4rem;
      padding: 0.7rem 1rem;
      margin-right: 1rem;
      box-shadow: 0 0.1rem 0.2rem rgba(0, 0, 0, 0.2), 0 0.1rem 0.5rem rgba(0, 0, 0, 0.3), 0 0.2rem 1.5rem rgba(0, 0, 0, 0.4);
    }
    
    .tag span {
      font-size: 1.2rem;
      color: #64748b;
    }
    
    .fade {
      pointer-events: none;
      background: linear-gradient(90deg, #000000, transparent 10%, transparent 90%, #000000);
      position: absolute;
      inset: 0;
    }
    
    @keyframes loop {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-50%);
      }
    }
  </style>

</head>

<body>

  <div class="hero_area">
    <!-- header -->
    <?php include 'header.php' ?>
     
    <!-- slider section -->
    <section class="slider_section">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel" >
        <div class="carousel-inner" >
          <div class="carousel-item active">
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
                        <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
                        <dotlottie-player
                        src="js/animaciones/animacion_server1.lottie"
                        background="transparent"
                        speed="1"
                        style="width: 450; height: 450px"
                        loop
                        autoplay>
                        </dotlottie-player>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
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
            <img src="images/s1.png" alt="">
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
            <img src="images/s2.png" alt="">
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
            <img src="images/s5.png" alt="">
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
<!-- end service section -->

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
            nosotros empezamos en este mundillo del desarrolo, encontrábamos que las únicas opciones valían demasiado para lo que podíamos permitirnos
            o eran incómodas y poco intuitivas. En Skyvault, ofrecemos la manera más rapida de desplegar páginas web a AWS con unos pococ clics.
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
<!-- end about section -->

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
<!-- end server section -->

<!-- infinite scroll section -->
<section class="scroll_section">
  <div class="container">
    <div class="tag-list">
      <!-- First row - normal direction -->
      <div class="loop-slider" style="--duration:40000ms; --direction:normal;">
        <div class="inner">
          <div class="tag"><span>#</span> JavaScript</div>
          <div class="tag"><span>#</span> webdev</div>
          <div class="tag"><span>#</span> Typescript</div>
          <div class="tag"><span>#</span> Next.js</div>
          <div class="tag"><span>#</span> UI/UX</div>
          <div class="tag"><span>#</span> animation</div>
          <div class="tag"><span>#</span> Tailwind</div>
          <div class="tag"><span>#</span> React</div>
          <div class="tag"><span>#</span> SVG</div>
          <div class="tag"><span>#</span> HTML</div>
          <div class="tag"><span>#</span> CSS</div>
          <div class="tag"><span>#</span> Vue.js</div>
          <div class="tag"><span>#</span> Angular</div>
          <div class="tag"><span>#</span> Node.js</div>
          <div class="tag"><span>#</span> Express</div>
          <div class="tag"><span>#</span> MongoDB</div>
          <div class="tag"><span>#</span> PostgreSQL</div>
          <div class="tag"><span>#</span> GraphQL</div>
          <div class="tag"><span>#</span> Redux</div>
          <div class="tag"><span>#</span> Firebase</div>
          <div class="tag"><span>#</span> AWS</div>
          <div class="tag"><span>#</span> Docker</div>
          <div class="tag"><span>#</span> Kubernetes</div>
          <div class="tag"><span>#</span> DevOps</div>
          <div class="tag"><span>#</span> CI/CD</div>
          <!-- duplicated content for seamless looping -->
          <div class="tag"><span>#</span> JavaScript</div>
          <div class="tag"><span>#</span> webdev</div>
          <div class="tag"><span>#</span> Typescript</div>
          <div class="tag"><span>#</span> Next.js</div>
          <div class="tag"><span>#</span> UI/UX</div>
          <div class="tag"><span>#</span> animation</div>
          <div class="tag"><span>#</span> Tailwind</div>
          <div class="tag"><span>#</span> React</div>
          <div class="tag"><span>#</span> SVG</div>
          <div class="tag"><span>#</span> HTML</div>
          <div class="tag"><span>#</span> CSS</div>
          <div class="tag"><span>#</span> Vue.js</div>
          <div class="tag"><span>#</span> Angular</div>
          <div class="tag"><span>#</span> Node.js</div>
          <div class="tag"><span>#</span> Express</div>
          <div class="tag"><span>#</span> MongoDB</div>
          <div class="tag"><span>#</span> PostgreSQL</div>
          <div class="tag"><span>#</span> GraphQL</div>
          <div class="tag"><span>#</span> Redux</div>
          <div class="tag"><span>#</span> Firebase</div>
          <div class="tag"><span>#</span> AWS</div>
          <div class="tag"><span>#</span> Docker</div>
          <div class="tag"><span>#</span> Kubernetes</div>
          <div class="tag"><span>#</span> DevOps</div>
          <div class="tag"><span>#</span> CI/CD</div>
        </div>
      </div>
      
      <!-- Second row - reverse direction -->
      <div class="loop-slider" style="--duration:45000ms; --direction:reverse;">
        <div class="inner">
          <div class="tag"><span>#</span> Gatsby</div>
          <div class="tag"><span>#</span> HTML</div>
          <div class="tag"><span>#</span> CSS</div>
          <div class="tag"><span>#</span> React</div>
          <div class="tag"><span>#</span> Next.js</div>
          <div class="tag"><span>#</span> webdev</div>
          <div class="tag"><span>#</span> Gatsby</div>
          <div class="tag"><span>#</span> JavaScript</div>
          <div class="tag"><span>#</span> Tailwind</div>
          <div class="tag"><span>#</span> Typescript</div>
          <div class="tag"><span>#</span> TensorFlow</div>
          <div class="tag"><span>#</span> Python</div>
          <div class="tag"><span>#</span> Django</div>
          <div class="tag"><span>#</span> Flask</div>
          <div class="tag"><span>#</span> SASS</div>
          <div class="tag"><span>#</span> LESS</div>
          <div class="tag"><span>#</span> StyledComponents</div>
          <div class="tag"><span>#</span> WebGL</div>
          <div class="tag"><span>#</span> ThreeJS</div>
          <div class="tag"><span>#</span> D3.js</div>
          <div class="tag"><span>#</span> Swift</div>
          <div class="tag"><span>#</span> Kotlin</div>
          <div class="tag"><span>#</span> Flutter</div>
          <div class="tag"><span>#</span> MobileDev</div>
          <div class="tag"><span>#</span> PWA</div>
          <!-- duplicated content for seamless looping -->
          <div class="tag"><span>#</span> Gatsby</div>
          <div class="tag"><span>#</span> HTML</div>
          <div class="tag"><span>#</span> CSS</div>
          <div class="tag"><span>#</span> React</div>
          <div class="tag"><span>#</span> Next.js</div>
          <div class="tag"><span>#</span> webdev</div>
          <div class="tag"><span>#</span> Gatsby</div>
          <div class="tag"><span>#</span> JavaScript</div>
          <div class="tag"><span>#</span> Tailwind</div>
          <div class="tag"><span>#</span> Typescript</div>
          <div class="tag"><span>#</span> TensorFlow</div>
          <div class="tag"><span>#</span> Python</div>
          <div class="tag"><span>#</span> Django</div>
          <div class="tag"><span>#</span> Flask</div>
          <div class="tag"><span>#</span> SASS</div>
          <div class="tag"><span>#</span> LESS</div>
          <div class="tag"><span>#</span> StyledComponents</div>
          <div class="tag"><span>#</span> WebGL</div>
          <div class="tag"><span>#</span> ThreeJS</div>
          <div class="tag"><span>#</span> D3.js</div>
          <div class="tag"><span>#</span> Swift</div>
          <div class="tag"><span>#</span> Kotlin</div>
          <div class="tag"><span>#</span> Flutter</div>
          <div class="tag"><span>#</span> MobileDev</div>
          <div class="tag"><span>#</span> PWA</div>
        </div>
      </div>
      
      <div class="fade"></div>
    </div>
  </div>
</section>
<!-- end infinite scroll section -->

<!-- info section -->
<?php include 'footer.php' ?>

<!-- jQery -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>

</body>
</html>