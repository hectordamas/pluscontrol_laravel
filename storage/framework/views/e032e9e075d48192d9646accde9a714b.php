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
              <li class="nav-item"><a class="nav-link scroll" href="#inicio">Inicio</a></li>
              <li class="nav-item"><a class="nav-link scroll" href="#beneficios">Beneficios</a></li>
              <li class="nav-item"><a class="nav-link scroll" href="#funciones">¿Cómo Funciona?</a></li>
              <li class="nav-item"><a class="nav-link scroll" href="#planes">Planes</a></li>
              <li class="nav-item"><a class="nav-link scroll" href="#contacto">Contacto</a></li>
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
    <!-- /header -->
    <section class="wrapper bg-soft-primary" id="inicio">
      <div class="container pt-5 pb-15 py-lg-17 py-xl-19 pb-xl-20 position-relative">
        <img class="position-lg-absolute col-12 col-lg-10 col-xl-11 col-xxl-10 px-lg-5 px-xl-0 ms-n5 ms-sm-n8 ms-md-n10 ms-lg-0 mb-md-4 mb-lg-0" src="./assets_page/img/Mockup1.png" srcset="./assets_page/img/Mockup1.png" data-cue="fadeIn" alt="" style="top: -1%; left: -21%;" />
        <div class="row gx-0 align-items-center">
          <div class="col-md-10 offset-md-1 col-lg-5 offset-lg-7 offset-xxl-6 ps-xxl-12 mt-md-n9 text-center text-lg-start" data-cues="slideInDown" data-group="page-title" data-delay="600">
            <h1 class="display-2 mb-4 mx-sm-n2 mx-md-0">Monitorea tu tanque de forma inteligente.</h1>
            <p class="lead fs-lg mb-7 px-md-10 px-lg-0">Descubre una forma inteligente de optimizar el agua de tu tanque con nuestra aplicación líder en IoT.</p>
            <div class="d-flex justify-content-center justify-content-lg-start" >
              <span><a href="https://apps.apple.com/app/apple-store/id6470241970" class="btn btn-dark btn-icon btn-icon-start rounded me-2"><i class="uil uil-apple"></i> App Store</a></span>
              <span><a href="https://play.google.com/store/apps/details?id=com.pluscontrol.app" class="btn btn-primary btn-icon btn-icon-start rounded"><i class="uil uil-google-play"></i> Google Play</a></span>
            </div>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light" id="beneficios">
      <div class="container py-10 py-md-5">
        <div class="row text-center mt-xl-5">
          <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <h2 class="fs-15 text-uppercase text-muted mb-3">Beneficios de PlusControl</h2>
            <h3 class="display-4 mb-9 px-xxl-11">Controla y moniteorea los niveles de agua en tiempo real.</h3>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="row gx-lg-8 gx-xl-12 gy-8 mb-14 mb-md-17" data-cues="slideInUp" data-group="services">
          <div class="col-md-6 col-lg-4">
            <div class="d-flex flex-row">
              <div>
                <img src="./assets_page/img/icons/lineal/analytics.svg" class="svg-inject icon-svg icon-svg-sm text-aqua me-4" alt="" />
              </div>
              <div>
                <h4 class="mb-1">Monitoreo en tiempo real.</h4>
                <p class="mb-0">Con PlusControl, puedes monitorear en tiempo real el nivel de agua, la presión y el consumo, brindándote un control total de tu sistema de suministro de agua.</p>
              </div>
            </div>
          </div>
          <!--/column -->
          <div class="col-md-6 col-lg-4">
            <div class="d-flex flex-row">
              <div>
                <img src="./assets_page/img/icons/lineal/clock-3.svg" class="svg-inject icon-svg icon-svg-sm text-yellow me-4" alt="" />
              </div>
              <div>
                <h4 class="mb-1">Automatización precisa.</h4>
                <p class="mb-0">Con nuestra "Automatización Precisa", PlusControl te brinda la capacidad de programar horarios de suministro de agua de manera exacta. Esto significa que puedes adaptar tu sistema a necesidades específicas.</p>
              </div>
            </div>
          </div>
          <!--/column -->
          <div class="col-md-6 col-lg-4">
            <div class="d-flex flex-row">
              <div>
                <img src="./assets_page/img/icons/lineal/light-bulb.svg" class="svg-inject icon-svg icon-svg-sm text-red me-4" alt="" />
              </div>
              <div>
                <h4 class="mb-1">Ahorro de costos y recursos </h4>
                <p class="mb-0">Con PlusControl, lograrás un significativo ahorro de costos y recursos. Nuestra plataforma eficiente y precisa te permite optimizar el uso del agua, reducir desperdicios y, en última instancia, disminuir tus gastos.</p>
              </div>
            </div>
          </div>
        </div>
        <!--/.row -->
        <div class="row gx-lg-8 gx-xl-10 mb-lg-3 align-items-center" id="funciones">
          <div class="col-lg-6">
            <figure><img src="./assets_page/img/mockup2.png" srcset="./assets_page/img/mockup2.png" data-cue="fadeIn" alt="" /></figure>
          </div>
          <!-- /column -->
          <div class="col-lg-6">
            <h2 class="fs-15 text-uppercase text-muted mb-3">¿Cómo funciona?</h2>
            <h3 class="display-4 mb-5">Descarga la App, inicia sesión en tu cuenta, y listo.</h3>
            <p class="mb-8">Tenemos planes económicos, solo debes contactarnos a través de correo electrónico o Whatsapp y ya tendrás a tu disposición tu cuenta de PlusControl, para ti y todos los usuarios que compartan tu tanque.</p>
            <div class="row gy-6 gx-xxl-8 process-wrapper" data-cues="slideInUp" data-group="process">
              <div class="col-md-4"> <img src="./assets_page/img/icons/lineal/cloud-computing.svg" class="svg-inject icon-svg icon-svg-sm text-green mb-3" alt="" />
                <h4 class="mb-1">1. Descarga</h4>
                <p class="mb-0">Descarga nuestra App en Play Store y App Store.</p>
              </div>
              <!--/column -->
              <div class="col-md-4"> <img src="./assets_page/img/icons/lineal/smartphone-2.svg" class="svg-inject icon-svg icon-svg-sm text-red mb-3" alt="" />
                <h4 class="mb-1">2. Inicia Sesión</h4>
                <p class="mb-0">Con tan solo proporcionar tu correo electrónico y tu contraseña.</p>
              </div>
              <!--/column -->
              <div class="col-md-4"> <img src="./assets_page/img/icons/lineal/rocket.svg" class="svg-inject icon-svg icon-svg-sm text-aqua mb-3" alt="" />
                <h4 class="mb-1">3. Comienza</h4>
                <p class="mb-0">Empieza a monitorear y a controlar las funciones de tu tanque inteligente.</p>
              </div>
              <!--/column -->
            </div>
            <!--/.row -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->

    <section class="wrapper bg-soft-primary" id="planes">
      <div class="container pb-20 pt-md-14 pb-md-22 text-center">
        <div class="row">
          <div class="col-sm-9 col-md-7 mx-auto">
            <h1 class="display-1 mb-3">Nuestros Planes</h1>
            <p class="lead mb-0">En PlusControl queremos brindarte las mejores soluciones, es por ello que a continuación
              te presentamos nuestros planes.</p>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper">
      <div class="container pb-14 pb-md-0">
        <div class="pricing-wrapper position-relative mt-n18 mt-md-n21 mb-12 mb-md-15">
          <div class="shape bg-dot primary rellax w-16 h-18" data-rellax-speed="1" style="top: 2rem; right: -2.4rem;"></div>
          <div class="shape rounded-circle bg-line red rellax w-18 h-18 d-none d-lg-block" data-rellax-speed="1" style="bottom: 0.5rem; left: -2.5rem;"></div>
          <div class="pricing-switcher-wrapper switcher">
            <p class="mb-0 pe-3">Mensual</p>
            <div class="pricing-switchers">
              <div class="pricing-switcher pricing-switcher-active"></div>
              <div class="pricing-switcher"></div>
              <div class="switcher-button bg-primary"></div>
            </div>
            <p class="mb-0 ps-3">Anual</p>
          </div>
          <div class="row gy-6 mt-3 mt-md-5 justify-content-center">
            <div class="col-md-6 col-lg-4">
              <div class="pricing card text-center">
                <div class="card-body">
                  <img src="./assets_page/img/icons/lineal/shopping-basket.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                  <h4 class="card-title">Plus Basic</h4>
                  <div class="prices text-dark">
                    <div class="price price-show"><span class="price-currency">$</span><span class="price-value">69</span> <span class="price-duration">mes</span></div>
                    <div class="price price-hide price-hidden"><span class="price-currency">$</span><span class="price-value">828</span> <span class="price-duration">año</span></div>
                  </div>
                  <!--/.prices -->
                  <ul class="icon-list bullet-bg bullet-soft-primary mt-8 mb-9 text-start">
                    <li><i class="uil uil-check"></i>Monitoreo 24/7 de los niveles del tanque, ingreso de agua, presión y consumo.</li>
                    <li><i class="uil uil-check"></i> Notificaciones Push en el celular sobre eventos.</li>
                    <li><i class="uil uil-check"></i> Histórico de datos.</li>
                    <li><i class="uil uil-check"></i> App para Android e iOS.</li>
                    <li><i class="uil uil-check"></i> Instalación Gratuita.</li>
                  </ul>
                </div>
                <!--/.card-body -->
              </div>
              <!--/.pricing -->
            </div>
            <!--/column -->
            <div class="col-md-6 col-lg-4">
              <div class="pricing card text-center">
                <div class="card-body">
                  <img src="./assets_page/img/icons/lineal/home.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                  <h4 class="card-title">Plus Master</h4>
                  <div class="prices text-dark">
                    <div class="price price-show"><span class="price-currency">$</span><span class="price-value">89</span> <span class="price-duration">mes</span></div>
                    <div class="price price-hide price-hidden"><span class="price-currency">$</span><span class="price-value">1068</span> <span class="price-duration">año</span></div>
                  </div>
                  <!--/.prices -->
                  <ul class="icon-list bullet-bg bullet-soft-primary mt-8 mb-9 text-start">
                    <li><i class="uil uil-check"></i>Monitoreo 24/7 de los niveles del tanque, ingreso de agua, presión y consumo.</li>
                    <li><i class="uil uil-check"></i> Notificaciones Push en el celular sobre eventos.</li>
                    <li><i class="uil uil-check"></i> Válvula inteligente para la apertura y cierre de agua vía aplicación.</li>
                    <li><i class="uil uil-check"></i> Programación inteligente de racionamiento de agua automatizado.</li>
                    <li><i class="uil uil-check"></i> Histórico de datos.</li>
                    <li><i class="uil uil-check"></i> App para Android e iOS.</li>
                    <li><i class="uil uil-check"></i> Instalación Gratuita.</li>
                  </ul>
                </div>
                <!--/.card-body -->
              </div>
              <!--/.pricing -->
            </div>
            <!--/column -->

          </div>
          <!--/.row -->
        </div>


        <!-- /.position-relative -->
      </div>
      <!-- /.container -->
    </section>

    <section id="contacto" class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 text-white" data-image-src="./assets_page/img/photos/bg3.jpg">
      <div class="container pt-17 pb-20 pt-md-19 pb-md-21 text-center">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h1 class="display-1 mb-3 text-white">Contáctanos</h1>
            <nav class="d-inline-block" aria-label="breadcrumb">
              <ol class="breadcrumb text-white">
                <li class="breadcrumb-item"><a href="#">Si tienes deseas obtener información, contratar alguno de nuestros planes o quieres reportar algún error, no dudes en contactarnos.</a></li>
              </ol>
            </nav>
            <!-- /nav -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

    <!-- /section -->
    <section class="wrapper bg-light angled upper-end">
      <div class="container pb-5">
        <div class="row mb-14 mb-md-16">
          <div class="col-xl-10 mx-auto mt-n19">
            <div class="card">
              <div class="row gx-0">
                <div class="col-lg-6 align-self-stretch">
                  <div class="map map-full rounded-top rounded-lg-start">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15692.566686600761!2d-66.8193593!3d10.4894962!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2a59c290ebf85f%3A0xc7af857b94391f69!2sGrupo%20Plus%20Wireplus%20%2F%20Ledplus!5e0!3m2!1ses-419!2sve!4v1698717861996!5m2!1ses-419!2sve" style="width:100%; height: 100%; border:0" allowfullscreen></iframe>
                  </div>
                  <!-- /.map -->
                </div>
                <!--/column -->
                <div class="col-lg-6">
                  <div class="p-10 p-md-11 p-lg-14">
                    <div class="d-flex flex-row">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
                      </div>
                      <div class="align-self-start justify-content-start">
                        <h5 class="mb-1">Dirección</h5>
                        <address>Calle Capitolio, Edif. BMX <br class="d-none d-md-block" />Boleita Sur, Miranda Venezuela.</address>
                      </div>
                    </div>
                    <!--/div -->
                    <div class="d-flex flex-row">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
                      </div>
                      <div>
                        <h5 class="mb-1">Teléfonos</h5>
                        <p>+(58)424-290-4810</p>
                        <p>+(58)212-239-6466</p>
                      </div>
                    </div>

                    <div class="d-flex flex-row">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-whatsapp"></i> </div>
                      </div>
                      <div>
                        <h5 class="mb-1">WhatsApp</h5>
                        <p>+(58)424-290-4810</p>
                      </div>
                    </div>
                    <!--/div -->
                    <div class="d-flex flex-row">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope"></i> </div>
                      </div>
                      <div>
                        <h5 class="mb-1">Correo Electrónico</h5>
                        <p class="mb-0"><a href="mailto:pluscontrol@grupo-plus.com" class="link-body">pluscontrol@grupo-plus.com</a></p>
                      </div>
                    </div>
                    <!--/div -->
                  </div>
                  <!--/div -->
                </div>
                <!--/column -->
              </div>
              <!--/.row -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->


      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->

  </div>
  <!-- /.content-wrapper -->
  <footer class="bg-dark text-light">
    <div class="container py-13 py-md-15">
      <div class="row gy-6 gy-lg-0">
        <div class="col-md-4 col-lg-4">
          <div class="widget">
            <img class="mb-4" style="max-width: 200px;" src="./assets_page/img/pluscontrol_logo_light.png" srcset="./assets_page/img/pluscontrol_logo_light.png" alt="" />
            <p class="mb-4">© 2023 Producciones Plus C.A. <br class="d-none d-lg-block" />Todos los derechos reservados.</p>
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
            <a href="mailto:pluscontrol@grupo-plus.com" class="link-body text-light">pluscontrol@grupo-plus.com</a><br /> +58 (424) 290 48 10
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
</body>

</html><?php /**PATH /home/customer/www/pluscontrol.grupo-plus.com/resources/views/welcome.blade.php ENDPATH**/ ?>