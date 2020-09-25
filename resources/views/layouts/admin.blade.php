<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" style="height: auto; min-height: 100%;">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }}</title>
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">


  <link href="{{ asset('plugins/toastr-master/build/toastr.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-master/dist/sweetalert2.min.css') }}">
  @yield('styles')

  <link href="{{ asset('AdminLTE/css/AdminLTE.min.css') }}" rel="stylesheet">
  <link href="{{ asset('AdminLTE/css/skins/_all-skins.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>


<body class="skin-purple sidebar-mini" style="height: auto; min-height: 100%;">      
 <div class="wrapper" style="height: auto; min-height: 100%;">

  <header class="main-header">

    <!-- Logo -->
    <a href="{{route('Principal')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>300</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Desafio</b>300</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">





          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="far fa-flag"></i>
            </a>            

            

          </li>
          <li class="dropdown tasks-menu">

            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>




      </ul>
    </div>

  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <section class="sidebar" style="height: auto;">

    <ul class="sidebar-menu tree" data-widget="tree">
      <li class="header">MENU</li>

      <li><a href="{{route('Usuarios')}}"><i class="fa fa-users"></i> <span> Usuarios</span></a></li>
      <li><a href="{{route('Atividades')}}"><i class="fas fa-dumbbell"></i> <span> Atividades</span></a></li>
      <li><a href="{{route('Medalhas')}}"><i class="fas fa-dumbbell"></i> <span> Desafios</span></a></li>
      <li><a href="{{route('Paginas')}}"><i class="far fa-file"></i> <span> Paginas</span></a></li>
      <li><a href="{{route('Categorias')}}"><i class="fas fa-bars"></i> <span> Categorias</span></a></li>
      <li><a href="{{route('Categorias')}}"><i class="fas fa-calendar-alt"></i> <span> Eventos</span></a></li>
      <li><a href="{{route('Arquivos')}}"><i class="far fa-file"></i> <span> Arquivos</span></a></li>
    </ul>
  </section>
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 959.8px;">
  <section class="content-header">
    <h1>
      Dashboard
      <small>{{\Request::route()->getName()}}</small>
    </h1>

  </section>
  <section class="content">
    @include('layouts.errors')
    @yield('content')
  </section>
</div>

</div>
<footer class="main-footer">
  <strong>Copyright © 2018 <a target="_blank"  href="#">Desafio 300 dias</a>.</strong> Todos os Direitos Reservados.<a href="{{url('/')}}"></a>
 <div class="float-right"> <strong>Desenvolvido por: <a href="mailto:gfreire@ufmg.br">Guilherme Freire</a></strong></div>
  </footer>
</div>
</div>
<script src="//code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
<script src="{{ asset('/plugins/jQuery-Mask/src/jquery.mask.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2-master/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/pace/pace.js')}}"></script>
<script src="{{ asset('AdminLTE/js/adminlte.min.js') }}"></script>
<script src="{{ asset('plugins/toastr-master/build/toastr.min.js') }}"></script>
<script src="{{ asset('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js') }}"></script>
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
@yield('scripts')

<script type="text/javascript">
 $(document).ajaxStart(function() { Pace.restart(); });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136786696-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136786696-1');
</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>