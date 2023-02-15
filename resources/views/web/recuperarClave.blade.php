<!-- ======= Sesion plantilla-usuario ======= -->
@extends('web.plantilla-usuario')
<!-- ======= Fin Sesion plantilla-usuario ======= -->

@section('contenido')
<body>
  <main>
  <section class="container book-a-table col-lg-5 pt-5 mt-5">
    <div class="text-center">

      <div class="section-title">
         <h2>Recuperar <span>Contraseña</span></h2>
        <h5>Se te enviara un correo con una clave que posteriosmente podrar cambiar </h5>
      </div>
      <div class="section-title py-2">
        <p>Ingresa tu correo electronico</p>
      </div>

      @if (isset($claveNormal) > 0)
            <p class="">Su nueva clave es: </p> {{ $claveNormal }} <br>
            <a class="" href="/iniciar-sesion">Volver la login.</a>
      @else
      <form action="" method="POST" role="form" class="php-email-form" style="border-radius: 35px">
        <div><input type="hidden" name="_token" value="{{ csrf_token() }}"></div>

        <div class="row">
            <div class="col-lg-15 col-12 form-group">
               <input type="email" name="txtCorreo" id="txtCorreo" class="form-control text-center" placeholder="Por favor ingrese su email." style="border-radius:20px; border-color: #ff9b08" data-rule="" data-msg="" required>
            </div>
        </div>
         <!-- ======= Botton submit he hipervinculos ======= -->
        <div class="row">
          <div class="col-6 col-ms-12 text-start"><a href="/iniciar-sesion">Volver al login</a></div>
           <div class="col-6 col-ms 12 text-end mx-0"><button type="submit">Enviar</button></div>
        </div>
         <!-- ======= Botton submit he hipervinculos ======= --> 
      </form>
      @endif

    </div>
  </section>
 </main>
</body>
@endsection