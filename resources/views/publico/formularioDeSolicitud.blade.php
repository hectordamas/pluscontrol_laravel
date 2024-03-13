@extends('layouts.index')
@section('content')
<section class="wrapper bg-soft-primary">
    <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
      <div class="row">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-6 col-xxl-5 mx-auto">
          <h1 class="display-1 mb-3">Solicita tu Presupuesto para PlusControl</h1>
          <p>
           Con PlusControl, obtendrás la solución perfecta. Nuestra plataforma te permite monitorear en tiempo real el nivel de agua, la presión y el consumo, brindándote un control sin precedentes. Además, podrás programar horarios de suministro de agua de manera exacta, adaptando tu sistema a necesidades específicas.
          </p>
          <!-- /nav -->
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<section class="wrapper bg-light">
    <div class="container py-14 py-md-16">
      <div class="row mb-14 mb-md-16">
        <div class="col-xl-12 mx-auto mt-n19">
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
                  <h2 class="display-4 mb-8">Contáctanos.</h2>
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
                      <p>+(58)412-258-3901</p>
                      <p>+(58)212-239-6466</p>
                    </div>
                  </div>

                  <div class="d-flex flex-row">
                    <div>
                      <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-whatsapp"></i> </div>
                    </div>
                    <div>
                      <h5 class="mb-1">WhatsApp</h5>
                      <p>+(58)412-258-3901</p>
                    </div>
                  </div>
                  <!--/div -->
                  <div class="d-flex flex-row">
                    <div>
                      <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope"></i> </div>
                    </div>
                    <div>
                      <h5 class="mb-1">Correo Electrónico</h5>
                      <p class="mb-0"><a href="mailto:info@pluscontrolve.com" class="link-body">info@pluscontrolve.com</a></p>
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
      <!--/.row -->
      <div class="row">
        <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
          <h2 class="display-4 mb-3 text-center">Déjanos Tu Mensaje</h2>
          <p class="lead text-center mb-10">Solicita ahora tu presupuesto personalizado y descubre cómo PlusControl puede ayudarte a ahorrar costos y recursos mientras gestionas eficientemente tu suministro de agua.</p>
          <form class="contact-form" method="post" action="{{ url('enviarSolicitud') }}">
            @csrf
            <div class="row gx-4">
              <div class="col-md-6">
                <div class="form-floating mb-4">
                  <input id="form_name" type="text" name="name" placeholder=" " class="form-control" required>
                  <label for="form_name">Nombre o Razón Social *</label>
                </div>
              </div>

              <!-- /column -->
              <div class="col-md-6">
                <div class="form-floating mb-4">
                  <input id="form_lastname" type="text" name="cedula" placeholder=" " class="form-control" required>
                  <label for="form_lastname">Cédula o RIF *</label>
                </div>
              </div>

              <!-- /column -->
              <div class="col-md-6">
                <div class="form-floating mb-4">
                  <input id="form_email" type="email" name="email" placeholder=" " class="form-control" required>
                  <label for="form_email">Correo Electrónico *</label>
                </div>
              </div>

              <!-- /column -->
              <div class="col-md-6">
                <div class="form-floating mb-4">
                  <input id="form_lastname" type="text" name="telefono" placeholder=" " class="form-control" required>
                  <label for="form_lastname">Teléfono de Contacto *</label>
                </div>
              </div>

              <!-- /column -->
              <div class="col-md-6">
                <div class="form-floating mb-4">
                  <input id="form_lastname" type="text" name="address" placeholder=" " class="form-control" required>
                  <label for="form_lastname">Dirección *</label>
                </div>
              </div>

              <!-- /column -->
              <div class="col-md-6">
                <div class="form-select-wrapper mb-4">
                  <select class="form-select" id="form-select" name="plan" required>
                    <option selected="" disabled="" value="">¿Qué Plan Te Interesa?</option>
                    <option value="Plan Basic">Plan Basic</option>
                    <option value="Plan Basic Plus">Plan Basic Plus</option>
                    <option value="Plan Master">Plan Master</option>
                    <option value="Plan Master Plus">Plan Master Plus</option>
                  </select>
                </div>
              </div>

              <!-- /column -->
              <div class="col-12">
                <div class="form-floating mb-4">
                  <textarea id="form_message" name="mensaje" class="form-control" placeholder=" " style="height: 150px" required></textarea>
                  <label for="form_message">Mensaje *</label>
                </div>
              </div>
              <!-- /column -->
              <div class="col-12 text-center">
                <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3 w-100" value="Enviar Mensaje">
                <p class="text-muted"><strong>*</strong> Todos Los Campos Son Obligatorios.</p>
              </div>
              <!-- /column -->
            </div>
            <!-- /.row -->
          </form>
          <!-- /form -->
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>

@endsection