<!-- ======= Sesion plantilla-usuario ======= -->
@extends('web.plantilla-usuario')
<!-- ======= Fin Sesion plantilla-usuario ======= -->

@section('contenido')
<body>
  <main id="main"> 
    <!-- ======= Section registrarse ======= -->
    <section id="book-a-table" class="book-a-table mt-4">

      <div class="container">

        <div class="section-title">
          <h2>Registrate <span>Ya</span></h2>
          <p>Crea tu cuenta para que siempre tengas acceso a nuestro delicioso menu.</p>
        </div>

        <form action="" method="post" role="" class="php-email-form">
          
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="txtUsuario" class="form-control" id="txtUsaurio" placeholder="Tu usuario:*" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group">
              <input type="text" name="txtName" class="form-control" id="txtName" placeholder="Tu nombre:*" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group mt-3">
              <input type="text" class="form-control" name="txtApellido" id="txtApellido" placeholder="Tus apellidos:*" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group mt-3">
              <input type="text" class="form-control" name="txtCelular" id="txtCelular" placeholder="Tu celular:*" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group mt-3">
              <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Tu direccion:*" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group mt-3">
              <input type="email" name="txtCorreo" class="form-control" id="txtCorreo" placeholder="Tu correo:*" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group mt-3">
              <input type="text" class="form-control" name="txtClave" id="txtClave" placeholder="Ingresa tu clave:**" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group mt-3 text-center">
              <button type="submit">Registrar</button>
            </div>
          </div>

          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
          </div>

          
        </form>
      </div>
    </section><!-- End Book A Table Section -->
  </main><!-- End #main -->
</body>
@endsection