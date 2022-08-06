<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    @yield('css')

    <title>Plataforma Emprender</title>

  </head>
  <body style="background-color: rgb(214, 214, 214);">
    {{-- <x-jet-banner />
    @livewire('navigation-menu') --}}

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/"><img src="{{asset('img/logos/emprender.png')}}" alt="" width="120" class="d-inline-block align-text-top"></a>
      <div class="d-flex"><span class="text-white">{{ Auth::user()->name }}</span></div>
      <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-secondary sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              @if(Auth::user()->is_admin == 1)
                <li class="nav-item">
                  <a href="/articulos" class="nav-link 
                    @if(request()->is('articulos')) active @endif
                    " aria-current="page">
                    <i class="bi bi-bookmark-star" style="font-size: 1rem; padding-right:6px;"></i>Publicaciones
                  </a>
                </li>
                <li>
                  <a href="/emprendedores" class="nav-link
                  @if(request()->is('emprendedores')) active @endif
                  ">
                    <i class="bi bi-person-bounding-box" style="font-size: 1rem; padding-right:6px;"></i>Emprendedores
                  </a>
                </li>
                <li>
                  <a href="/eventos" class="nav-link 
                  @if(request()->is('eventos')) active @endif
                  ">
                    <i class="bi bi-calendar2-check" style="font-size: 1rem; padding-right:6px;"></i>Eventos
                  </a>
                </li>
                <li>
                  <a href="/campanias" class="nav-link 
                  @if(request()->is('campanias')) active @endif
                  ">
                    <i class="bi bi-envelope-check" style="font-size: 1rem; padding-right:6px;"></i>Mails masivos
                  </a>
                </li>
                <li>
                  <a href="/galeria" class="nav-link
                  @if(request()->is('galeria')) active @endif
                  ">
                    <i class="bi bi-images" style="font-size: 1rem; padding-right:6px;"></i>Galería de fotos
                  </a>
                </li>
                <li>
                  <a href="/informes" class="nav-link
                  @if(request()->is('informes')) active @endif
                  ">
                    <i class="bi bi-newspaper" style="font-size: 1rem; padding-right:6px;"></i>Informes de gestión
                  </a>
                </li>
                <li>
                  <a target="_blank" href="https://webmail.plataformaemprender.org" class="nav-link
                  @if(request()->is('https://webmail.plataformaemprender.org')) active @endif
                  ">
                    <i class="bi bi-inboxes-fill" style="font-size: 1rem; padding-right:6px;"></i>Casilla de correo
                  </a>
                </li>
              @elseif(Auth::user()->is_admin == 0)
                <li>
                  <a href="/emprendedores/edit" class="nav-link
                    @if(request()->is('emprendedores*') && !request()->is('emprendedores/listar')) active @endif
                    ">
                    <i class="bi bi-person-hearts" style="font-size: 1rem; padding-right:6px;"></i>Mi cuenta
                  </a>
                </li>
                <li>
                  <a href="/emprendimientos/edit" class="nav-link @if(request()->is('emprendimientos*')) active @endif">
                    <i class="bi bi-bricks" style="font-size: 1rem; padding-right:6px;"></i>Mi emprendimiento
                  </a>
                </li>
                <li>
                  <a href="/emprendedores/listar" class="nav-link @if(request()->is('emprendedores/listar')) active @endif">
                    <i class="bi bi-person-bounding-box" style="font-size: 1rem; padding-right:6px;"></i>Emprendedores
                  </a>
                </li>
              @endif

              <hr class="dropdown-divider">
              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
                <span>Usuario</span>
              </h6>
              <li>
                <a href="{{ route('profile.show') }}" class="nav-link"><i class="bi bi-person-circle" style="font-size: 1rem; padding-right:6px;"></i>Perfil</a>
              </li>
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="nav-link"><i class="bi bi-box-arrow-right" style="font-size: 1rem; padding-right:6px;"></i>Salir</a>
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                  @csrf
                </form>
              </li>
            </ul>
          </div>
        </nav>
        
        @yield('content')
        
      </div>
    </div>        

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
      var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
      var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
      })
    </script>

  </body>
</html>
