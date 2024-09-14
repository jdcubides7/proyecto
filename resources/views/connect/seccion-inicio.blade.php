@extends('connect.pagina')
@section('title','Art Grafic')
@section('content')

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0 color">
  <div>
    <!--buscador-->
    <nav class="navbar color-nav">
      <div class="container-fluid">
        <a class="navbar-brand text-red ">Restausoft</a>
        <form class="d-flex" role="search">
          <!--<a href="#" class="btn1" type="submit">Registrarse</a>-->
          <!--<button type="button" class="btn btn-primary">Primary</button>-->
          <!--boton con clases-->
          <a class="btn-register" style="background-color: #272727" href="{{url('/registro')}}">Registrarse</a>
          <!--<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
          <a class="btn-login" style="background-color: #272727" href="{{url('/ingreso')}}">Ingresar a Restausoft</a>
        </form>
      </div>
  </div>
  <!--carrousel -->
  <!--columnas
    <div class="container">
        <div class="row">
            <div class="col-3">hola columna</div>
            <div class="col-4">hola columna</div>
            <div class="col-5">hola columna</div>
        </div>
    </div>
-->
  <div id="Control" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active text-white carousel-item-custom" style="background-color: #272727">

        <ol>
          <li>Manejo de Inventarios, actualizacion de inventarios, control de ventas.</li>
          <li>Soporte en configuracion de software</li>
          <li>Contactanos por medio de nuestros canales de whatsapp, o registrate para mas información</li>
        </ol>


        <a href="https://wa.me/+573197109873" target="_blank">
          <i class="fab fa-whatsapp fa-2x" style="color: #25D366;"></i> <!-- Ícono de WhatsApp -->
          <p>Canal de Whatsapp Restausoft
        </a>


      </div>
      <div class="carousel-item">

        <img src="{{ url('/static/img/giphy_2.gif') }}" class="d-block w-100" alt="banner 2" width="1500" height="250">
      </div>
      <div class="carousel-item">


        <img src="{{ url('/static/img/restausoft_2.png') }}" class="d-block w-100" alt="banner 3" width="1500" height="250">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#Control" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#Control" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>

  <div>
    <img src="{{ url('/static/img/productos.png') }}" class="d-block w-100" alt="productos_img" width="1500" height="400">
  </div>
</div>

<div class="color">
  <center>
    <h2 class="text-red">Siguenos en nuestras redes sociales</h2>
  </center>
  <p>Twitter</p>
  <center>
    <h2 class="text-red">Twitter</h2></br><a href="https://twitter.com/tu_usuario" target="_blank">
      <i class="fab fa-twitter fa-2x" style="color: #1DA1F2;"></i>
    </a>
    </br>
    </br>
  </center>
  <center>
    <h2 class="text-red">Instagram</h2>
    </br>
    <a href="https://instagram.com/tu_usuario" target="_blank">
      <i class="fab fa-instagram fa-2x" style="color: #C13584;"></i>
    </a>
    </br>
    </br>
  </center>




</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


@stop