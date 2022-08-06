@extends('layouts.vistapadre')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sofia&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Stencil+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.min.css') }}" />
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.es.js') }}"></script>
@endsection

@section('contenido')
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach($articulos as $articulo)
                @if($loop->first)
                    <div class="carousel-item active">
                @else
                    <div class="carousel-item">
                @endif
                    <img src="{{ asset('img/slideHeader/'. $loop->index .'.jpg')}}" alt="">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>{{$articulo->titulo}}</h1>
                            <p>{!! nl2br(substr($articulo->contenido,0,100)) !!}...</p>
                            <p><a class="btn" href="blog/{{$articulo->id}}">Continuar leyendo</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section id="galeria">
        <div class="container"> 
            <div class="title">
                <h2><strong class="black">Galería de fotos</strong></h2>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="caja-foto">
                        <img class="img-fluid foto-galeria" src="{{ asset('img/galeria/Galeria1.jpg') }}?nocache=<?php echo time(); ?>" alt="" />
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="caja-foto">
                        <img class="img-fluid foto-galeria" src="{{ asset('img/galeria/Galeria2.jpg') }}?nocache=<?php echo time(); ?>" alt="" />
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="caja-foto">
                        <img class="img-fluid foto-galeria" src="{{ asset('img/galeria/Galeria3.jpg') }}?nocache=<?php echo time(); ?>" alt="" />
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="caja-foto">
                        <img class="img-fluid foto-galeria" src="{{ asset('img/galeria/Galeria4.jpg') }}?nocache=<?php echo time(); ?>" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="nosotros">
        <div class="container">
            <div class="title">
                <h2><strong class="black">Nosotros</strong></h2>
                <h3>¿Qué te ofrecemos?</h3>
            </div>
        </div>

        <div class="nosotros-bg">
            <div class="container">
                <div class="white-bg">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="caja-nosotros text-uppercase" data-aos="zoom-in" data-aos-delay="200">
                                <i><a href="#modalNosotros" role="button" data-bs-toggle="modal"><img src="img/nosotros/nosotrosColor.png"/></a></i>
                                <h3><strong class="black">Programas</strong></h3>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="caja-nosotros text-uppercase" data-aos="zoom-in" data-aos-delay="200">
                                <i><a href="#modalVision" role="button" data-bs-toggle="modal"><img src="img/nosotros/objetivoColor.png"/></a></i>
                                <h3><strong class="black">Visión</strong></h3>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="caja-nosotros text-uppercase" data-aos="zoom-in" data-aos-delay="200">
                                <i><a href="#modalMision" role="button" data-bs-toggle="modal"><img src="img/nosotros/destinatariosColor.png"/></a></i>
                                <h3><strong class="black">Misión</strong></h3>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="caja-nosotros text-uppercase" data-aos="zoom-in" data-aos-delay="200">
                                <i><a href="#modalAlianza" role="button" data-bs-toggle="modal"><img src="img/nosotros/alizanzaColor.png"/></a></i>
                                <h3><strong class="black">Alianzas</strong></h3>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container mx-auto w-50">
                        <div class="row">
                            <div class="col">
                                <div class="title-reducido">
                                    <h3>Informes de gestión anual</h3>
                                </div>
                                <label for="informes-anuales">Seleccione un año</label>
                                <select class="form-select form-select-sm" name="informes" id="informes">
                                    @foreach ($informes as $informe)
                                        <option value="{{$informe->pdf}}">
                                            {{$informe->anio}}     
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalNosotros">
            <div class="modal-dialog">
                <div class="modal-content rounded-0 border-0">
                    <div class="modal-body">
                        <div class="modal-nosotros">
                            <h3><strong class="naranja">Nuestros programas</strong></h3>
                            <p>Somos un espacio de interacción 
                                y vinculación entre instituciones del medio y emprendedores, 
                                promovido y apoyado por la Secretaría de Ciencia y Tecnología y Gestión Pública y 
                                auspiciado por el Gobierno de la Provincia de Santiago del Estero.</p>
                            <a href="https://www.openfuture.org/hubs/el-nodo-open-future" target="_blank">OPEN FUTURE</a>
                            <br>
                            <a href="htmls/incubar.php">PROGRAMA INCUBAR</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalVision">
            <div class="modal-dialog">
                <div class="modal-content rounded-0 border-0">
                    <div class="modal-body">
                        <div class="modal-nosotros">
                            <h3><strong class="gris">Visión</strong></h3>
                            <ul>
                                <li><p>Gestionar el Valor Regional para generar el desarrollo social y económico apoyando 
                                al emprendedurismo en la provincia de Santiago del Estero y en el NOA, 
                                tomando en cuenta que la virtualidad y la fuerza de las redes sociales permitieron 
                                trascender fronteras limítrofes.</p>
                                </li>
                                <li><p>Consolidar el Ecosistema emprendedor, en el vínculo con 
                                instituciones del medio para que entre todos puedan contribuir al apoyo emprendedor regional.</p>
                                </li>
                            </ul>   
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalMision">
            <div class="modal-dialog">
                <div class="modal-content rounded-0 border-0">
                    <div class="modal-body">
                        <div class="modal-nosotros">
                            <h3><strong class="verde">Misión</strong></h3>
                            <ul>
                                <li><p>Lograr el desarrollo económico y social en territorio de la provincia de Santiago del Estero y el NOA, acompañando a emprendedores 
                                (con ideas o proyectos) para que puedan generar un emprendimiento innovador o diferencial, escalable y orientado a satisfacer necesidades 
                                de la industria (negocios denominados: business to business o B2B).</p>
                                </li>
                                <li><p>Lograr el desarrollo económico y social en territorio de la provincia de Santiago del Estero y del NOA, acompañando emprendedores 
                                (en actividad) para que logren formalizar e insertarse en un mercado consolidado sea este local, provincial o regional.</p>
                                </li>
                                <li><p>Asistir, de manera virtual, a eventos de organismos públicos o privados que contemplan la agenda del Ecosistema Emprendedor 
                                nacional y regional con el fin de intercambiar buenas prácticas, actividades y tendencias que en el país y en Santiago 
                                se desarrollan, a nivel emprendedurismo.</p>
                                </li>
                                <li><p>Acompañar a las PYMES en nuevos conceptos a desarrollarse a nivel nacional: por ejemplo, triple impacto, 
                                asociatividad, exportación, asistencia técnica especifica. Y que las PYMES puedan acompañar a los Emprendedores.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalAlianza">
            <div class="modal-dialog">
                <div class="modal-content rounded-0 border-0">
                    <div class="modal-body">
                        <div class="modal-nosotros">
                            <h3><strong class="aguamarina">Alianzas</strong></h3>
                            <p>Trabajo cooperativo con instituciones del medio con el fin de compartir buenas prácticas institucionales.</p>                        </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="plataformas">
        <div class="container">
            <div class="title">
                <h2><strong class="black">Nuestra plataforma...</strong></h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="main-timeline4">
                        <div class="timeline">
                            <h6 class="timeline-content">
                                <span class="area" data-aos="zoom-in" data-aos-delay="200">Motiva</span>
                                <div class="inner-content">
                                    <h3 class="title">Plataforma Emprender MOTIVA</h3>
                                    <p class="description">
                                        Motiva la cultura emprendedora.
                                    </p>
                                </div>
                            </h6>
                        </div>
                        <div class="timeline">
                            <h6 class="timeline-content">
                                <span class="area" data-aos="zoom-in" data-aos-delay="200">Incuba</span>
                                <div class="inner-content">
                                    <h3 class="title">Plataforma Emprender INCUBA</h3>
                                    <p class="description">
                                    Da respuesta a emprendedores con ideas, proyectos y en economía social, para que pasen por un proceso de maduración.
                                    </p>
                                </div>
                            </h6>
                        </div>
                        <div class="timeline">
                            <h6 class="timeline-content">
                                <span class="area" data-aos="zoom-in" data-aos-delay="200">Potencia</span>
                                <div class="inner-content">
                                    <h3 class="title">Plataforma Emprender POTENCIA</h3>
                                    <p class="description">
                                    Da respuesta a emprendedores constituidos como pymes o empresas con capacitaciones enfocados exclusivamente a ellos, en lo que respecta a nuevas tendencias en la industria y establecer el vínculo para acompañar a emprendedores.
                                    </p>
                                </div>
                            </h6>
                        </div>
                        <div class="timeline">
                            <h6 class="timeline-content">
                                <span class="area" data-aos="zoom-in" data-aos-delay="200">Perdura</span>
                                <div class="inner-content">
                                    <h3 class="title">Plataforma Emprender PERDURA</h3>
                                    <p class="description">
                                    Fortalece el Ecosistema Emprendedor para aunar esfuerzos entre instituciones públicas, privadas, locales y nacionales, en pos del beneficio emprendedor regional. Con visibilidad y participación del Ecosistema Emprendedor Local en eventos Nacionales y Regionales.
                                    </p>
                                </div>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="aliados" class="bg-dark">
        <div class="container">
            <div class="title-reducido">
                <h2><strong class="black">Aliados</strong></h2>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://www.unse.edu.ar/" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/unse.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="http://www.ucse.edu.ar/" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/ucse.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://21.edu.ar/" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/siglo21.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://www.argentina.gob.ar/inta" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/inta.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://www.argentina.gob.ar/inti" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/inti.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="http://cpia-sgodelestero.com.ar/" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/CPIA.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://www.facebook.com/AGICA-Asociaci%C3%B3n-de-Graduados-en-Ingenier%C3%ADa-y-Ciencias-de-Alimentos-268403283923995" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/agica.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://cpcese.org.ar/" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/cpce.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://cic-sgo.negocio.site/" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/cc.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://www.empretec.org.ar/" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/empretec.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://www.endeavor.org.ar/" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/endeavor.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://www.disenioaladi.org/" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/aladi.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="http://uisde.com.ar/" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/uisde.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://www.areatresworkplace.com/home" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/area3.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://www.unaje.org.ar/" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/unaje.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://www.openfuture.org/hubs/el-nodo-open-future" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/openfuture.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://nodosde.gob.ar/" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/scyt.png" alt="">
                    </a>
                </div>
                <div class="col-md-2 col-sm-3 col-4">
                    <a href="https://www.argentina.gob.ar/produccion" target="_blank">
                    <img class="img-fluid d-block mx-auto img-aliados" src="img/logos/desarrollo.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="emprendedores" class="emprendedor">
        <div class="container">
            <div class="title">
                <h2><strong class="black">Emprendedores</strong></h2>
            </div>
            <div id="cuatroEmprendedores">
                <div class="row">
                @foreach($emprendedores as $emprendedor)
                    @if($emprendedor->nombre<>'')
                    <div class="col-lg-6">
                        <div class="miembro d-flex align-items-start">
                            <div class="pic"><img src="{{ asset('img/logos_emprendimientos/'. $emprendedor->logo) }}" class="img-fluid" alt=""></div>
                            <div class="miembro-info">
                                <h4>{{$emprendedor->name}}</h4>
                                <span>{{$emprendedor->nombre}}</span>
                                <p>{{$emprendedor->idea}}</p>
                                <div class="social">
                                    <a href="{{$emprendedor->mail}}" target="_blank"><i class="far fa-envelope"></i></a>
                                    <a href="{{$emprendedor->face}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{$emprendedor->insta}}" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="{{$emprendedor->web}}" target="_blank"><i class="fas fa-sitemap"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                </div>
            </div>   
        </div>
    </section>

    <section id="buscaEmprendedores" class="bg-buscaEmprendedores">
        <div class="row">
            <div class="cuadro-busca mx-auto">
                <div class="title-reducido">
                    <h3>Búsqueda de emprendedores</h3>
                    <h6>Especifique su búsqueda</h6>
                </div>
                
                <form action="{{ route('emprendedores.lista_sector') }}" method="post">
                    @csrf
                    @method('GET')
                    <div class="row">
                        <div class="col-md-6 offset-md-3 form-group">
                            <select class="form-control form-select" id="sector" name="sector" required>
                                <option value="">Seleccione un sector</option>
                                @foreach($sectores as $sector)
                                    <option value="{{$sector->id}}">{{$sector->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center"><button class="btn-emprender" type="submit" data-toggle="modal" data-target="#modalFiltroEmprendedor">Obtener datos</button></div>
                    </div>
                </form>
            
                <div class="modal" id="modalFiltroEmprendedor">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content rounded-0 border-0">    
                            <div class="modal-body">
                                <div class="title-reducido">
                                    <h3>Listado de emprendedores</h3>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success mensaje_buscar" style="display: none" role="alert">
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive tabla-busca-emprendedores">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Emprendedor</th>
                                                <th>Emprendimiento</th>
                                                <th>Sector</th>
                                                <th>Mail</th>
                                                <th>Celular</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabla-buscar">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-emprender" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>

    <section id="calendario-eventos" class="bg-light">
        <div class="title">
            <h2><strong class="black">Calendario de eventos</strong></h2>
            <h3>Lo que planificamos para vos</h3>
        </div>
        <div class="row">
            <div class="cuadro-calendario mx-auto row">
                <div class="col-lg-8 col-md-12">
                    <div id="calendario"></div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div id="caja-evento">
                        <h6 id="titulo-evento"></h6>
                        <img id="imagen-evento" class="img-fluid mb-2" src="" alt="">
                        <h4 id="dia-inicio-evento"></h4>
                        <h4 id="hora-inicio-evento"></h4>
                        <h4 id="dia-fin-evento"></h4>
                        <h4 id="hora-fin-evento"></h4>
                        <h4 id="descripcion-evento"></h4>
                        <h4 id="lugar-evento"></h4>
                    </div>  
                </div>
            </div>
        </div>
    </section>

    <section id="contacto">
        <div class="container">
            <div class="title">
                <h2><strong class="black">Contacto</strong></h2>
            </div>
        </div>
        <div class="contacto-bg">
            <div class="container">
                <div class="white-bg">
                    <div class="row">
                        <div class="col-md-7 mb-md-0 mb-5">
                            @if (session()->has('message'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {{ Session::get('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                    
                            <form class="form_contacto" id="formulario-contacto" name="formulario-contacto" method="post" action="{{route('contacto')}}">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-0">
                                            <label for="nombre" class="">Nombre</label>
                                            <input type="text" id="nombre" name="nombre" class="form-control" required minlength="3" maxlength="40">    
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-0">
                                            <label for="email" class="">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" required minlength="3" maxlength="40">    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-0">
                                            <label for="asunto" class="">Asunto</label>
                                            <input type="text" id="asunto" name="asunto" class="form-control" required minlength="3" maxlength="100">    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="mensaje">Mensaje</label>
                                        <textarea type="text" id="mensaje" name="mensaje" rows="3" class="form-control md-textarea"  required minlength="3" maxlength="300"></textarea>   
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">    
                                            {!! NoCaptcha::renderJs() !!}
                                            {!! NoCaptcha::display() !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-emprender" name="submit-contacto" type="submit">Enviar</button>
                                        <div class="text-center p-chica">
                                            <p>¿No tiene cuenta? <a href="{{ route('register') }}">Regístrese aquí</a></p>
                                        </div>
                                    </div>   
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success mensaje_contacto" style="display: none" role="alert">
                                            Tu mensaje fue enviado exitosamente.
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5">
                            <ul class="list-unstyled mb-0">
                                <li class="items-ubicacion text-center"><i class="fas fa-map-marker-alt fa-2x"></i>
                                    <p>Av. Los Molinos e Industria Argentina (2,61 km) 4300 La Banda, Argentina</p>
                                </li>
                                <li class="items-ubicacion text-center"><i class="fas fa-phone mt-4 fa-2x"></i>
                                    <p>3855336637</p>
                                </li>
                                <li class="items-ubicacion text-center"><i class="fas fa-envelope mt-4 fa-2x"></i>
                                    <p>info@plataformaemprender.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>


@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script>
        $(document).ready(function () {
            var calendarEl = document.getElementById('calendario');
            calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'UTC', 
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,listMonth'
            },
            locale: 'es',
            weekNumbers: false,
            dayMaxEvents: true, 
            selectable: true,
            editable: false,
            height: 500,
            events: "/eventos/json",
            eventClick: function(info) {
                $('#titulo-evento').text(info.event.title);
                $('#dia-inicio-evento').text("Inicio: "+info.event.extendedProps.inicio);
                $('#hora-inicio-evento').text("Hora inicio: "+info.event.extendedProps.hora_inicio);
                $('#dia-fin-evento').text("Finalización: "+info.event.extendedProps.fin);
                $('#hora-fin-evento').text("Hora finalización: "+info.event.extendedProps.hora_fin);
                $('#descripcion-evento').text("Descripción: "+info.event.extendedProps.descripcion);
                $('#lugar-evento').text("Link: "+info.event.extendedProps.lugar);
                $('#imagen-evento').attr('src','img/eventos/'+info.event.extendedProps.folleto);    
            }
          });
        calendar.render();
        });

        $('#informes').mouseenter(function() {
            window.open('pdf/informe/'+$('#informes').val(),'_blank');
        });
    
    $(function(){
        @if(session()->has('message'))
            $('html, body').animate({
                scrollTop: $("#contacto").offset().top
            }, 2000);
        @endif
    });
          
     </script>
    
    <script src="{{ asset('js/aos.js') }}"></script>
    <script>AOS.init();</script>
@endsection