<!-- ======= Sesion plantilla-usuario ======= -->
@extends('web.plantilla-usuario')
<!-- ======= Fin Sesion plantilla-usuario ======= -->

@section('contenido')
<body>
  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about mt-5">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("web/img/about.jpg");'>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3>Eum ipsam laborum deleniti <strong>velit pariatur architecto aut nihil</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bx bx-check-double"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Whu Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Porque elegir <span>Nuestro Restaurante</span></h2>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box">
              <span>01</span>
              <h4>Lorem Ipsum</h4>
              <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>02</span>
              <h4>Repellat Nihil</h4>
              <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>03</span>
              <h4> Ad ad velit qui</h4>
              <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Whu Us Section -->

    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2><span>Contacta</span> Nos</h2>
          <p>En este mapa podras encontrar nuestra ubicacion y la de todas nuestras sedes y todo la imformacion necesaria.</p>
        </div>
      
        <form action="" method="post" role="" enctype="multipart/form-data" class="php-email-form mt-2" style="border-radius: 30px">
          <div class="text-center"><h4>Trabaja con nosotros</h4></div>
          <!-- ======= Section token ======= -->
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <!-- ======= Section token ======= -->
        <div class="row">
          <div class="col-md-6 form-group mt-1">
            <input type="text" name="txtNombre" class="form-control" id="txtNombre" style="border-radius:20px; border-color: #ff9b08" placeholder="Tu nombre:*" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group mt-1">
            <input type="text" class="form-control" name="txtApellido" id="txtApellido" style="border-radius:20px; border-color: #ff9b08" placeholder="Tus apellidos:*" data-rule="email" data-msg="Please enter a valid email">
            <div class="validate"></div>
          </div>

          <div class="col-md-6 form-group mt-1">
            <input type="text" class="form-control" name="txtCelular" id="txtCelular" style="border-radius:20px; border-color: #ff9b08" placeholder="Tu celular:*" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group mt-1">
            <input type="email" name="txtCorreo" class="form-control" id="txtCorreo" style="border-radius:20px; border-color: #ff9b08" placeholder="Tu correo:*" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-md-6 col-lg-12 form-group mt-1">
            <input type="text" name="txtDireccion" class="form-control" id="txtDireccion" style="border-radius:20px; border-color: #ff9b08" placeholder="Tu direccion:*" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          
          <div class="col-md-6 form-group mt-1 mx-px-0">
            <input type="file" name="archivo" id="archivo" accept=".pdf,.docx, . doc" required>
            <p>Formatos: pdf, docx; doc.</p>
          </div>

          <div class='col-md-6 form-group mt-1 mx-px-0 text-center'>
            <button type="submit" style="width: 50%">Enviar</button>
          </div>
         
        </div>  

      </form>

    </div>
  </section>
</main> 
</body>
@endsection

@section('sucursale')
    <?php
      echo "Direciones y telefonos" . "<br>";
      $n=1;
      foreach($aSucursal as $item) {
        echo "Direccion " . $n . " " . $item->direccion . " TEL: " . $item->telefono . "<br>";
        $n++;
      }
     ?>
  @endsection