<!-- ======= Sesion plantilla-usuario ======= -->
@extends('web.plantilla-usuario')
<!-- ======= Fin Sesion plantilla-usuario ======= -->

@section('contenido')
<body>
  <main>
    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container">

        <div class="section-title">
          <h2>Mi <span>Cuenta</span></h2>
          <p>Aca podras verificar tus datos personales, editarlos si es necesario.</p>
        </div>

        <form action="" method="POST" class="php-email-form" style="border-radius: 35px">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="row">
            <div class=" col-md-6 form-group">
              <input type="text" name="txtUsuario" class="form-control" id="txtUsuario" value="{{ $datosClienteSession->usuario }}" placeholder="Tu usuario" style="border-radius:20px; border-color: #ff9b08">
            </div>
            <div class=" col-md-6 form-group">
              <input type="text" name="txtNombre" class="form-control" id="txtNombre" value="{{ $datosClienteSession->nombre }}" placeholder="Tu nombre" style="border-radius:20px; border-color: #ff9b08">
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="txtApellido" id="txtApellido" value="{{ $datosClienteSession->apellido }}" placeholder="Tu apellido" style="border-radius:20px; border-color: #ff9b08">
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="txtCedula" id="txtCedula" value="{{ $datosClienteSession->cedula }}" placeholder="Tu cedula" style="border-radius:20px; border-color: #ff9b08">
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="txtCelular" id="txtCelular" value="{{ $datosClienteSession->celular }}" placeholder="Tu celular" style="border-radius:20px; border-color: #ff9b08">
             </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" value="{{ $datosClienteSession->correo }}" placeholder="Tu correo" style="border-radius:20px; border-color: #ff9b08">
              </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" value="{{ $datosClienteSession->direccion }}" placeholder="Tu direccion" style="border-radius:20px; border-color: #ff9b08; width: 800px">
            </div>
            <!-- ======= Button submit ======= -->
            <div class="text-center col-md-6 form-group mt-3 mt-md-0">
              <button type="submit">Guardar</button>
              <a href='/' class="ml-5">Cancelar</a>
            </div>
            <!-- ======= Button submit ======= -->
          </div> 
          <div class="mt-2"><a href='/cambiar-clave' class="ml-5">Cambiar clave.</a></div>
        </form>
      </div>
    </section><!-- End Book A Table Section -->
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