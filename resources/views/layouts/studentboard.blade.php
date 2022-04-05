<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="api-base-url" content="{{ url('/') }}" />
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="description" content="EmeraldField School Portals; for result computation made with love by  Emmanuel Chidera Ikeogu">
  <meta name="author" content="EmeraldField School">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EmeraldField Schools') }} |
        @yield('title')
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    {{-- <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield('style')
      <style>
        body,
            p,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            td,
            th,
            span,
            .btn,
            strong,
            label,
            option,
            form,
            select,
            .input-group-text {
                font-size: 0.8rem  !important;
            }
      </style>
</head>

<body id="page-top">
    
      <div id="wrapper">

          <!-- Sidebar -->
          <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
              <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
              </div>
              <div class="sidebar-brand-text mx-3">EmeraldField <sup>Portal</sup></div>
            </a>
      
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
      
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
              <a class="nav-link" href="/">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Student Dashboard</span></a>
            </li>
      
            <!-- Divider -->
            <hr class="sidebar-divider">
      
            <!-- Heading -->
            <div class="sidebar-heading">
              Interface
            </div>
      
            
      
            <!-- Divider -->
            <hr class="sidebar-divider">
          
            <!-- Nav Item - Charts -->
            <li class="nav-item">
            <a class="nav-link" href="{{route('studAss')}}">
                  <i class="fas fa-fw fa-chart-area"></i>
                  <span>Assignment</span></a>
              </li>
                      
            <li class="nav-item">
            <a class="nav-link" href="{{route('student.dashboard')}}">
                  <i class="fas fa-fw fa-chart-area"></i>
                  <span>Biodata</span></a>
              </li>
              
            
      
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
      
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
      
          </ul>
          <!-- End of Sidebar -->
      
          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">
      
            <!-- Main Content -->
              <div id="content">
      
                  <!-- Topbar -->
                  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                     <!-- Topbar Navbar -->
                      <ul class="navbar-nav ml-auto">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                          <i class="fa fa-bars"></i>
                        </button>
  
                        
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
  
                          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                          <li class="nav-item">
                            
                            <!-- Dropdown - Messages -->
                            <p id="demo" class="m-o text-bold"></p>
                          </li>
                          <!-- Topbar Navbar -->
              
                          <div class="topbar-divider d-none d-sm-block"></div>
              
                          <!-- Nav Item - User Information -->
                          <li class="nav-item dropdown no-arrow">
                          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                              <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                          </a>
                          <!-- Dropdown - User Information -->
                          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                              
                              
                              <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              Logout
                              </a>
                          </div>
                          </li>
              
                      </ul>
              
                  </nav>
                  <div id="app">
                      @yield('sboard')
                  </div>
              </div>
              <!-- End of Main Content -->
          
              <!-- Footer -->
              <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                  <span>Copyright &copy; EmeraldField Schools {{date('Y')}}</span>
                  </div>
              </div>
              </footer>
              <!-- End of Footer -->
    
          </div>
          <!-- End of Content Wrapper -->
    
      </div>
      <!-- End of Page Wrapper -->
    
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>
    
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="/logout">Logout</a>
            </div>
          </div>
        </div>
      </div>
    
      <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
      <!-- Core plugin JavaScript-->
      <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    
      <!-- Custom scripts for all pages-->
      <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    
      <!-- Page level plugins -->
      <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
    
      <!-- Page level custom scripts -->
      <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
      <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
    <script>
      function goBack() {
        window.history.back();
      }
      </script>

<script>

  var today = new Date()
  var curHr = today.getHours()

  if (curHr >= 0 && curHr < 6) {
      document.getElementById("demo").innerHTML = 'What are you doing that early?';
  } else if (curHr >= 6 && curHr < 12) {
      document.getElementById("demo").innerHTML = 'Good Morning!';
  } else if (curHr >= 12 && curHr < 17) {
      document.getElementById("demo").innerHTML = 'Good Afternoon!';
  } else {
      document.getElementById("demo").innerHTML = 'Good Evening!';
  }

</script>
      
        
  <!-- Page Wrapper -->
 
        <!-- End of Topbar -->
    </body>
      
    </html>