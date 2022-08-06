<!doctype html>
<html lang="en" class="h-100">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/emprender.css') }}">

    @yield('css')

    <script src="https://kit.fontawesome.com/cdc0ca6a21.js" crossorigin="anonymous"></script> 

    <title>Plataforma Emprender</title>

  </head>
  <body class="d-flex flex-column h-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">
            <img src="{{asset('img/logos/emprender.png')}}" alt="" width="120">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/blog">Noticias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/#galeria">Galería</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/#nosotros">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/#aliados">Aliados</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/#emprendedores">Emprendedores</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/#calendario-eventos">Eventos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/#contacto">Contacto</a>
              </li>
              
              @auth
                  <a href="{{ url('/dashboard') }}" class="nav-link text-sm text-gray-700 dark:text-gray-500 underline">Panel</a>
              @else
                  <a href="{{ route('login') }}" class="nav-link text-sm text-gray-700 dark:text-gray-500 underline">Ingresar</a>

                  @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="nav-link ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrarse</a>
                  @endif
              @endauth
            </ul>
          </div>
        </div>
    </nav>

    <div class="icon-bar">
        <a href="https://www.facebook.com/PlataformaEmprender" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="https://wa.link/fj5fcq" target="_blank" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
        <a href="https://instagram.com/plataformaemprender?igshid=fq86gu5zl36g" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="https://www.youtube.com/channel/UCy_M0vnsdLSZwTD7p91VJRA" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a>
    </div>

    @yield('contenido')

    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container">
          <span class="text-muted">Copyright 2022 - Plataforma Emprender</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @yield('js')

  </body>
</html>