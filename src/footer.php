<section class="info_section layout_padding2">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="info_contact">
          <h4>
            Dirección
          </h4>
          <div class="contact_link_box">
            <a href="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Gran Vía, 25
              </span>
            </a>
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                skyvault@gmail.com
              </span>
            </a>
          </div>
        </div>
        <div class="info_social">
          <a href="">
            <i class="fa fa-facebook" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-linkedin" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="info_link_box">
          <h4>
            Enlaces
          </h4>
          <div class="info_links">
            <a class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">
              <img src="images/nav-bullet.png" alt="">
              Inicio
            </a>
            <a class="<?php echo basename($_SERVER['PHP_SELF']) == 'deploy.php' ? 'active' : ''; ?>" href="deploy.php">
              <img src="images/nav-bullet.png" alt="">
              Desplegar
            </a>
            <a class="<?php echo basename($_SERVER['PHP_SELF']) == 'paginas.php' ? 'active' : ''; ?>" href="paginas.php">
              <img src="images/nav-bullet.png" alt="">
              Mis páginas
            </a>
            <a class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>" href="contact.php">
              <img src="images/nav-bullet.png" alt="">
              Contáctanos
            </a>
            <a class="<?php echo basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : ''; ?>" href="login.php">
              <img src="images/nav-bullet.png" alt="">
              Iniciar sesión
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="info_detail">
          <h4>
            Nuestra Historia
          </h4>
          <p>
            Skyvault es una empresa de servicios de despliegue y hosting de infraestructura web, 
            fundada el año 2025 por Gabriel Cerdá y Kevin Rojas con el objetivo de hacer más accesible 
            la virtualización en la nube, especialmente para principiantes.
          </p>
        </div>
      </div>
      <div class="col-md-3 mb-0">
        <h4>
          Suscríbete
        </h4>
        <form action="#">
          <input type="text" placeholder="Correo Electrónico" />
          <button type="submit">
            Suscribirme
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- sección que incluye el año y el copyright -->
<footer class="footer_section">
  <div class="container">
    <p>
      &copy; <span id="displayYear"></span> Skyvault, todos los derechos reservados
    </p>
  </div>
</footer>

<script src="js/bootstrap.js"></script>

