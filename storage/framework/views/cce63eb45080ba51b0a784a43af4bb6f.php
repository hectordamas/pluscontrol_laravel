<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>PlusControl - Administrador</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('build/assets/style.css')); ?>" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>" />
</head>
<body>
    <div style="position: absolute; top:0; right: 0; left: 0; bottom:0; background: rgba(0, 0, 0, 0.1);"></div>
    <div id="app" style="z-index: 10;">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                    <img src="<?php echo e(asset('assets/pluscontrol_logo_light.png')); ?>" class="w-100" style="max-width: 180px;"/>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <?php if(auth()->guard()->check()): ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownUser" class="nav-link dropdown-toggle" href="#">Usuarios</a>
                                
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                                    <a class="dropdown-item" href="<?php echo e(url('users')); ?>">Lista de Usuarios</a>
                                    <a class="dropdown-item" href="<?php echo e(url('users/create')); ?>">Crear Usuario</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownDevice" class="nav-link dropdown-toggle" href="#">Dispositivos</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownDevice">
                                    <a class="dropdown-item" href="<?php echo e(url('esps')); ?>">Lista de Dispositivos</a>
                                    <a class="dropdown-item" href="<?php echo e(url('esps/create')); ?>">Crear Dispositivo</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script src="<?php echo e(asset('build/assets/script.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script src="<?php echo e(asset('script.js')); ?>"></script>

    <?php if(session()->has('message')): ?>
    <script>
        Swal.fire({
            icon:'success', 
            title:'', 
            text: "<?php echo e(session('message')); ?>", 
            confirmButtonText: "Aceptar", 
            confirmButtonColor: '#4BB543'
        })
    </script>
    <?php endif; ?>

    <?php if(session()->has('error')): ?>
    <script>
        Swal.fire({
            icon:'error', 
            title:'Error', 
            text: "<?php echo e(session('error')); ?>", 
            confirmButtonText: "Aceptar", 
            confirmButtonColor: '#4BB543'
        })
    </script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH D:\Proyectos en Curso\pluscontrol\pluscontrol_back\resources\views/layouts/app.blade.php ENDPATH**/ ?>