<!-- ======= Sesion plantilla-usuario ======= -->
@extends('web.plantilla-usuario')
<!-- ======= Fin Sesion plantilla-usuario ======= -->

@section('contenido')
<body>
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2><span>Contacta</span> Nos</h2>
          <p>En este mapa podras encontrar nuestra ubicacion y la de todas nuestras sedes y todo la imformacion necesaria.</p>
        </div>
      </div>

      <div class="map">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container mt-5">
        <div class="info-wrap" style="border-radius: 35px">
          <div class="row">
            <div class="col-lg-3 col-md-6 info">
              <i class="bi bi-geo-alt"></i>
              <h4>Localisacion:</h4>
              <p>A108 Adam Street<br>New York, NY 535022</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-clock"></i>
              <h4>Horario de apertura:</h4>
              <p>Monday-Saturday:<br>11:00 AM - 2300 PM</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@example.com<br>contact@example.com</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-phone"></i>
              <h4>Celular:</h4>
              <p>+1 5589 55488 51<br>+1 5589 22475 14</p>
            </div>
          </div>
        </div>

        <form action="" method="POST" enctype="multipart/form-data" class="php-email-form mt-2" style="border-radius: 30px">
          <div class="text-center"><h4>Envianos tus datos estaremos en contacto</h4></div>
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
          <div class="col-md-12 form-group mt-1">
            <input type="text" name="txtDireccion" class="form-control" id="txtDireccion" style="border-radius:20px; border-color: #ff9b08" placeholder="Tu direccion:*" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-md-12 form-group mt-1 text-center">
            <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Dejamos tu comentario" style="border-radius:20px; border-color: #ff9b08"></textarea>
          </div>

          <div class="text-center">
            <button type="submit" style="width: 50%">Enviar</button>
          </div>
        </div>        
      </form>
        
      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->
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