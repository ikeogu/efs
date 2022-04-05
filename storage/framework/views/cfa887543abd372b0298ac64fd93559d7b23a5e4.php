<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="api-base-url" content="<?php echo e(url('/')); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="description" content="EmeraldField School Portals; for result computation made by ikeogu Emmanuel Chidera">
    <meta name="author" content="EmeraldField School">
    
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'EmeraldField Schools')); ?> |
        <?php echo $__env->yieldContent('title'); ?>
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/sb-admin-2.css')); ?>" rel="stylesheet">
    
</head>
<body>
    <div>
        
        
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    
        <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('js/sb-admin-2.js')); ?>"></script>
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
    
</body>
</html>
<?php /**PATH /home/ishledpg/efs/resources/views/layouts/app.blade.php ENDPATH**/ ?>