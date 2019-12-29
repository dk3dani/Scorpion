<html lang="en" style="height: auto;"><script src="sweetalert2.min.js"></script><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Scorpion</title>
<link rel="stylesheet" href="/css/app.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

 <!-- Font Awesome Icons -->
</head>

  <body class="sidebar-mini sidebar-collapse" style="height: auto;">
  <div id="app" class="wrapper">
    <!-- Navbar -->
    <nav  class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      <!-- Right navbar links -->
      <ul class="navbar-nav col-3 ml-auto">
             <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="{{route('customers.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Clientes
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{route('seams.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-cut"></i>
                  <p>
                    Costuras
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/widgets.html" class="nav-link">
                  <i class="nav-icon fas fa-dollar-sign"></i>
                  <p>
                    Pagamento
                    <span class="right badge badge-danger">Novo</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/widgets.html" class="nav-link">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>
                    vendas
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style=" margin-top:30px; min-height: 1203.6px;">


      <!-- Main content -->
      <div class="content">

        <div class="container-fluid">

                @yield('content')


        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->




    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright © Daniel Stocki 2019 </strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>
  <div id="sidebar-overlay"></div></div>
  <!-- ./wrapper -->

  <script src="/js/app.js"></script>
  <script src="https://kit.fontawesome.com/cd58fdfd71.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
@include('sweetalert::alert')


  </body>
  </html>
