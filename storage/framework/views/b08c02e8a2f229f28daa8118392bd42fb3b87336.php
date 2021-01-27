<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>

  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="api-base-url" content="<?php echo e(url('/')); ?>" />
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="description" content="EmeraldField School Portals; for result computation made by ikeogu Emmanuel Chidera">
  <meta name="author" content="EmeraldField School">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title><?php echo e(config('app.name', 'EmeraldField Schools')); ?> |
        <?php echo $__env->yieldContent('title'); ?>
    </title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <?php echo $__env->yieldContent('style'); ?>
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    
    <link href="<?php echo e(asset('css/sb-admin-2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">


</head>

<body id="page-top">
  
  <!-- Page Wrapper -->
  <div id="wrapper">
    
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">EmeraldField <sup>Portal</sup></div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      
      <!-- Nav Item - Pages Collapse Menu -->
    <?php if(auth()->check() && auth()->user()->isAdmin == 1): ?>
              
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Students</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
              <a class="collapse-item" href="<?php echo e(route('students.index')); ?>">
                  <i class="fas fa-fw fa-chart-area"></i>
                  <span> All Students</span></a>
                  <a class="collapse-item" href="<?php echo e(route('eschool')); ?>">Early Year</a>
                  <a class="collapse-item" href="<?php echo e(route('hschool')); ?>">High School Students</a>
              <a class="collapse-item" href="<?php echo e(route('jhschool')); ?>">Junior High School</a>
            <a class="collapse-item" href="<?php echo e(route('yschool')); ?>">Year School Students</a>
            
            <div class="collapse-divider"></div>
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('term')); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Create new Term</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('import')); ?>">
            <i class="fas fa-fw fa-setting-o"></i>
            <span>Import Students </span></a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('class.index')); ?>">
          <i class="fas fa-fw fa-house"></i>
          <span>Classes</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('subjects.index')); ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Subjects</span></a>
      </li>
        
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('teachers.index')); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Teacher</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('grades.index')); ?>">
            <i class="fas fa-fw fa-setting-o"></i>
            <span>Grade Settings</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('ind')); ?>">
            <i class="fas fa-fw fa-setting-o"></i>
            <span>Individual result</span></a>
      </li> 
     
      <?php elseif(auth()->check() && auth()->user()->isAdmin == 4): ?>
      
      <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('student.dashboard')); ?>">
                  <i class="fas fa-fw fa-chart-area"></i>
                  <span>Biodata</span></a>
              </li>
    <?php endif; ?>
       
     
    
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

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <button onclick="goBack()" class=" btn btn-warning text-white btn-block btn-sm">Go Back</button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <button onclick="goBack()" class=" btn btn-warning text-white btn-block btn-sm">Go Back</button>
              </div>
            </li>
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
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
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div id="app">
          <!-- Content Row -->
          <div class="row">
            <?php echo $__env->yieldContent('content'); ?>
            
          </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <span>Copyright &copy; EmeraldField Schools <?php echo e(date('Y')); ?></span>
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
 
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo e(asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo e(asset('vendor/chart.js/Chart.min.js')); ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo e(asset('js/demo/chart-area-demo.js')); ?>"></script>
  <script src="<?php echo e(asset('js/demo/chart-pie-demo.js')); ?>"></script>
  
    <script>
      function goBack() {
        window.history.back();
      }
    </script>
   
</body>

</html>
<?php /**PATH C:\Bitnami\wampstack-7.4\apache2\htdocs\Laravel Projects\efs\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>