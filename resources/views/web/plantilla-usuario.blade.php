<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="web/img/favicon.png" rel="icon">
  <link href="web/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="web/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="web/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="web/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="web/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="web/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="web/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Delicious - v4.10.0
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
         <div class="logo me-auto">
            <h1><a href="/">Burgers</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
         </div>
        
         <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
               <li><a class="nav-link scrollto" href="/">Inicio</a></li>
               <li><a class="nav-link scrollto" href="/takeaway">Takeaway</a></li>
               <li><a class="nav-link scrollto" href="/contacto">Contacto</a></li>
               <li><a class="nav-link scrollto" href="/nosotros">Nosotros</a></li>
               @if(Session::get('fk_idcliente') <= 0)
                  <li><a class="nav-link scrollto" href="/registrarse">Registrate</a></li> 
               @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
         </nav><!-- .navbar -->

         @if (Session::get("fk_idcliente") > 0)
         <a href="/carrito" class="book-a-table-btn scrollto">Carrito ({{$cantidadCarrito}})</a>
          <a href="/mi-cuenta" class="book-a-table-btn scrollto">Mi cuenta</a>
          <a href="/cerrar-sesion" class="book-a-table-btn scrollto">Cerrar session</a>
        @else
         <a href="/iniciar-sesion" class="book-a-table-btn scrollto">Iniciar seccion</a>  
        @endif
 </div>
  </header><!-- End Header -->

  <!-- ======= Agregar contenido ======= -->
  @yield('contenido')
  <!-- ======= Agregar contenido ======= -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Burgers</h3>
      <p>Sucursales</p>
      <!-- ======= Agregar sucursales ======= -->
        @yield('sucursale')
      <!-- ======= Agregar sucursales ======= -->
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Burgers</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>