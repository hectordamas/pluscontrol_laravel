<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PlusControl - Monitorea tu tanque de forma inteligente</title>
  <link rel="shortcut icon" href="./assets_page/img/icono.png">
  <link rel="stylesheet" href="./assets_page/css/plugins.css">
  <link rel="stylesheet" href="./assets_page/css/style.css">
  <link rel="stylesheet" href="./assets_page/css/colors/aqua.css">
  <link rel="preload" href="./assets_page/css/fonts/thicccboi.css" as="style" onload="this.rel='stylesheet'">
</head>

<body>
  <div class="content-wrapper">
    <header class="wrapper bg-soft-primary">
      <nav class="navbar navbar-expand-lg classic transparent navbar-light">
        <div class="container flex-lg-row flex-nowrap align-items-center">
          <div class="navbar-brand w-100">
            <a href="/">
              <img 
                src="./assets_page/img/pluscontrol_logo.png"  
                srcset="./assets_page/img/pluscontrol_logo.png" 
                alt="" 
                style="max-width: 230px; width: 100%;"
              />
            </a>
          </div>
          <div class="navbar-collapse offcanvas-nav">
            <div class="offcanvas-header d-lg-none d-xl-none">
              <a href="/"><img style="max-width: 150;" src="./assets_page/img/pluscontrol_logo_light.png" srcset="./assets_page/img/pluscontrol_logo_light.png" alt="" /></a>
              <button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-nav-close" aria-label="Close"></button>
            </div>
            <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link scroll" href="/#inicio">Inicio</a></li>
              <li class="nav-item"><a class="nav-link scroll" href="/#beneficios">Beneficios</a></li>
              <li class="nav-item"><a class="nav-link scroll" href="/#funciones">¿Cómo Funciona?</a></li>
              <li class="nav-item"><a class="nav-link scroll" href="/#planes">Planes</a></li>
              <li class="nav-item"><a class="nav-link scroll" href="/#contacto">Contacto</a></li>
              <li class="nav-item"><a class="nav-link scroll" href="/solicitud">Solicitar Presupuesto</a></li>
            </ul>
            <!-- /.navbar-nav -->
          </div>

          <div class="navbar-other ms-lg-4">
            <ul class="navbar-nav flex-row align-items-center ms-auto" data-sm-skip="true">
              <li class="nav-item d-lg-none">
                <div class="navbar-hamburger"><button class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button></div>
              </li>
            </ul>
            <!-- /.navbar-nav -->
          </div>

          <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
      </nav>
      <!-- /.navbar -->
    </header>

    <?php echo $__env->yieldContent('content'); ?>
    


</div>
<!-- /.content-wrapper -->
<footer class="bg-dark text-light">
  <div class="container py-13 py-md-15">
    <div class="row gy-6 gy-lg-0">
      <div class="col-md-4 col-lg-4">
        <div class="widget">
          <img class="mb-4" style="max-width: 200px;" src="./assets_page/img/pluscontrol_logo_light.png" srcset="./assets_page/img/pluscontrol_logo_light.png" alt="" />
          <p class="mb-4">© <?php echo e(date('Y')); ?> Producciones Plus C.A. <br class="d-none d-lg-block" />Todos los derechos reservados.</p>
          <nav class="nav social ">
            <a href="https://www.instagram.com/pluscontrol.ve/" target="blank"><i class="uil uil-instagram"></i></a>
          </nav>
          <!-- /.social -->
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->
      <div class="col-md-4 col-lg-4">
        <div class="widget">
          <h4 class="widget-title  mb-3 text-light">Contáctanos</h4>
          <address>Calle Capitolio, Edif. BMX <br class="d-none d-md-block" />Boleita Sur, Miranda Venezuela.</address>
          <a href="mailto:info@pluscontrolve.com" class="link-body text-light">info@pluscontrolve.com</a><br />+(58) 412-258-3901
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->
      <div class="col-md-4 col-lg-4">
        <div class="widget">
          <h4 class="widget-title  mb-3 text-light">Enlaces</h4>
          <ul class="list-unstyled text-reset mb-0">
            <li><a class="scroll" href="#inicio">Inicio</a></li>
            <li><a class="scroll" href="#beneficios">Beneficios</a></li>
            <li><a class="scroll" href="#funciones">¿Cómo Funciona?</a></li>
            <li><a class="scroll" href="#planes">Planes</a></li>
            <li><a class="scroll" href="#contacto">Contacto</a></li>
          </ul>
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->

    </div>
    <!--/.row -->
  </div>
  <!-- /.container -->
</footer>
<div class="progress-wrap">
  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
  </svg>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="./assets_page/js/plugins.js"></script>
<script src="./assets_page/js/theme.js"></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BLPV7B88TF">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BLPV7B88TF');
</script>
</body>

</html><?php /**PATH D:\Proyectos en Curso\pluscontrol\pluscontrol_laravel\resources\views/layouts/index.blade.php ENDPATH**/ ?>