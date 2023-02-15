<!-- ======= Sesion plantilla-usuario ======= -->
@extends('web.plantilla-usuario')
<!-- ======= Fin Sesion plantilla-usuario ======= -->

@section('contenido')
<body> 
   <main>
      <!-- ======= Book A Table Section ======= -->
      <section id="book-a-table" class="book-a-table">
         <div class="container text-center">

            <div class="section-title">
               <h2>Iniciar <span>Sesion</span></h2>
                  <p>Ingresa su usuario y contraseña.</p>
               </div>

               <div class="row text-center">
                  <div class="col-12 col-lg-6 offset-sm-3">

                  <form action="" method="POST" class="php-email-form" style="border-radius: 20px">
                     @if (isset($mensaje))
                         {{$mensaje}}
                     @endif
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="row">
                        <div class="col-lg-15 col-md-12 form-group">
                           <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" style="border-radius: 20px" placeholder="Tu correo" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-15 col-md-6 form-group mt-3 mt-md-0">
                           <input type="text" name="txtClave" id="txtCalve" class="form-control" style="border-radius: 20px; width: 350px" placeholder="Tu contraseña" data-rule="minlen:4" data-msg="Please enter a valid email" required>
                           <div class="validate"></div>
                        </div>
                        <!-- ======= Section button ======= -->
                        <div class="text-center col-md-6">
                           <button type="submit" style="width: 150px">Iniciar</button>
                        </div>
                        <!-- ======= Section button ======= -->
                     </div>

                     <div class="row text-start">
                        <div class="col-md-12">
                           <a href="/recuperar-clave">¿Olvidaste tu clave?</a>
                        </div>
                        <div class="col-md-12">
                           <a href="/registrarse">¿No tienes cuenta registrate?</a>
                        </div>
                     </div>   
                  </form>
               </div>
            </div>
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