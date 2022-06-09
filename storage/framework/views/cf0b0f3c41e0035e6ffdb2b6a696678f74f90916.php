<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/now-ui-dashboard.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/now-ui-dashboard.min.js')); ?>" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/now-ui-dashboard.min.css')); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="<?php echo e(asset('js/demo.js')); ?>"></script>

</head>


</head>

<body>
    <div class="sidebar" data-color="orange">
        <!-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow -->
        <div class="logo">
            <a href="<?php echo e(route('welcome')); ?>" class="simple-text logo-mini">SGC</a>

            <a href="<?php echo e(route('welcome')); ?>" class="simple-text logo-normal"> Gestión de Calidad</a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="<?php echo e(route('welcome')); ?>">
                        <i class="now-ui-icons design_app"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('problemasolucions.index')); ?>">
                        <i class="now-ui-icons loader_gear"></i>
                        <p>Problemas y soluciones</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('manualesguias.index')); ?>">

                        <i class="now-ui-icons files_single-copy-04"></i>

                        <p>Manuales y guías</p>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('reglamento.index')); ?>">

                        <i class="now-ui-icons design_bullet-list-67"></i>

                        <p>Reglamento</p>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('capacitacion.index')); ?>">

                        <i class="now-ui-icons travel_info"></i>

                        <p>Capacitación</p>
                    </a>
                </li>

                

                <li>
                    <a href="http://sige.cucsh.udg.mx/public/" target="_blank">

                        <i class="now-ui-icons business_globe"></i>

                        <p>Sige</p>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <a class="nav-link text-dark" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <a class="nav-link text-dark" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                            <?php endif; ?>
                        <?php else: ?>
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                    class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>

<div class="main-panel" id="main-panel">
    <nav class="navbar navbar-expand-lg" style="background:#195270">
            <a class="navbar-brand" href="<?php echo e(route ('welcome')); ?>">SGC - SISTEMA DE GESTIÓN DE CALIDAD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('welcome')); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('problemasolucions.index')); ?>">Problemas y
                            Soluciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manuales y guías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reglamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Capacitación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">SIGE</a>
                    </li>

                    <ul class="navbar-nav">

                        <!-- Authentication Links test-->
                        <ul class="navbar-nav ml-auto">
                            <?php if(auth()->guard()->guest()): ?>
                                <?php if(Route::has('login')): ?>
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                <?php endif; ?>

                                <?php if(Route::has('register')): ?>
                                    <a class="nav-link"
                                        href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                        class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </ul>
                    </ul>

                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                            </div>
                        </form>


                    </div>
                </ul>
            </div>
        </nav>
    <?php echo $__env->yieldContent('content'); ?>
</div>

<!--   Core JS Files   -->
<script src="<?php echo e(asset('js/jquery.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/popper.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/perfect-scrollbar.jquery.min.js')); ?>" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="<?php echo e(asset('js/chartjs.min.js')); ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo e(asset('js/bootstrap-notify.js')); ?>"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo e(asset('js/now-ui-dashboard.min.js')); ?>" type="text/javascript"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo e(asset('js/demo.js')); ?>"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo e(asset('js/now-ui-dashboard.js')); ?>" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\SGC\resources\views/layouts/app.blade.php ENDPATH**/ ?>