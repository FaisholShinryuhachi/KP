<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> @yield('title') </title>

    <!-- Bootstrap core CSS-->
    <link href="{!! asset('theme/vendor/bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{!! asset('theme/vendor/fontawesome-free/css/all.min.css')!!}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{!! asset('theme/vendor/datatables/dataTables.bootstrap4.css')!!}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{!! asset('theme/css/sb-admin.css')!!}" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Enol DSS & Management Stock Item</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      
      <!-- Navbar Search -->
      
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      </form> 
     

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
            <div class="dropdown-divider"></div>
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

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Stock</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('spk')}}">
            <i class="fas fa-fw fa-industry"></i>
            <span>DSS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('masuk')}}">
            <i class="fas fa-fw fa-plus-circle"></i>
            <span>Masuk</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('keluar')}}">
            <i class="fas fa-fw fa-minus-circle"></i>
            <span>Keluar</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ url('customer/') }}">Customer</a>
            <a class="dropdown-item" href="{{ url('item/') }}">Item</a>
            <a class="dropdown-item" href="{{ url('category/') }}">Category</a>
            <a class="dropdown-item" href="{{ url('satuan/') }}">Satuan</a>
          </div>
        </li> 
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-plus"></i>
            <span>Data Baru</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ url('customer/new') }}">New Customer</a>
            <a class="dropdown-item" href="{{ url('item/new') }}">New Item</a>
            <a class="dropdown-item" href="{{ url('category/new') }}">New Category</a>
            <a class="dropdown-item" href="{{ url('satuan/new') }}">New Satuan</a>
          </div>
        </li>               
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->

          @yield('breadcumb')
         
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <!-- i class="fas fa-table"></i -->
              <h1 class="page-header"> @yield('pageHeader') </h1></div>
            <div class="card-body">

              {{-- part alert --}}
              @if (Session::has('condition'))
                  <div class="row">
                      <div class="col-md-12">
                          <div class="alert alert-dismissible alert-{{ Session::get('condition.alert') }}">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ Session::get('condition.title') }}
                                {{ Session::get('condition.text-1') }}
                                {{ Session::get('condition.text-2') }}
                            </strong>
                          </div>
                      </div>
                  </div>
              @endif
              {{-- end part alert --}}
              
              @yield('content')


            </div>
          </div>
        </div>
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Fahmi Faishol Majid 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="{!! asset('theme/vendor/jquery/jquery.min.js')!!}"></script>
    <script src="{!! asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js')!!}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{!! asset('theme/vendor/jquery-easing/jquery.easing.min.js')!!}"></script>

    <!-- Page level plugin JavaScript-->
    <!--script src="{!! asset('theme/vendor/datatables/jquery.dataTables.js')!!}"></script-->
    <!--script src="{!! asset('theme/vendor/datatables/dataTables.bootstrap4.js')!!}"></script-->

    <!-- Custom scripts for all pages-->
    <script src="{!! asset('theme/js/sb-admin.min.js')!!}"></script>

    <!-- Chart -->

    <script src="{!! asset('theme/vendor/chart.js/Chart.min.js')!!}"></script>

    <!-- Demo scripts for this page-->
    <!--script src="{!! asset('theme/js/demo/datatables-demo.js')!!}"></script--> 

    <!-- Datatable untuk tampilan-->
    <!--script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script-->
    <script src="{!! asset('datatables/datatables.min.js')!!}"></script>
    


    <!-- Java untuk denpendant drop down -->
    @yield('javascript')

    <!-- Untuk script datatable -->
      <!--script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script-->
   @stack('scripts')





  </body>

</html>
