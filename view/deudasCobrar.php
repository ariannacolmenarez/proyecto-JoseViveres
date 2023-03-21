        <div class="modal fade" id="exampleModalToggle13" aria-hidden="true" aria-labelledby="exampleModalToggleLabel13" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                  <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel13">Cuenta Por Cobrar </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="deudas" data-bs-toggle="tab" data-bs-target="#deudas-pane" type="button" role="tab" aria-controls="deudas-pane" aria-selected="true">
                      <p class="card-title text-md-center text-danger text-xl-left">Cuentas</p> 
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="abonos-tab" data-bs-toggle="tab" data-bs-target="#abonos-tab-pane" type="button" role="tab" aria-controls="abonos-tab-pane" aria-selected="false"> 
                      <p class="card-title text-md-center text-success text-xl-left">Abonos</p>
                    </button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="deudas-pane" role="tabpanel" aria-labelledby="deudas" tabindex="0">
                    <h5 class="m-auto p-2 text-center"id="nombreC"></h5>
                    <div class="card m-auto mt-1 p-3" style="width: 18rem;">
                      <p class="card-title text-md-center text-dark text-xl-left"><span class="badge bg-success rounded-pill" id="cantC"></span> Cuentas</p>
                      <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"id="montoC"></h3>
                        <i class="ti-money icon-md text-success mb-0 mb-md-3 mb-xl-0"></i>
                      </div>
                    </div> 
                    <div class="list-group list-group-flush mt-2" id="lista_cobrar">
                      
                    </div>
                  </div>
                  <div class="tab-pane fade" id="abonos-tab-pane" role="tabpanel" aria-labelledby="abonos-tab" tabindex="0">
                    <h4 class="m-auto p-2 text-center">Abonos</h4>
                    <div class="list-group list-group-flush mt-2" id="lista_abonosc">
                      
                    </div>
                  </div>
                </div>
              </div>

              
              
            </div>
          </div>
        </div>
              <!-- modal ends -->

        <div class="modal fade" id="exampleModalToggle14" aria-hidden="true" aria-labelledby="exampleModalToggleLabel14" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel14">Resumen </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="card m-auto mt-2" style="width: 20rem;">
                <div class="card-body">
                  <div class="row">
                      <div class="col">
                          <b>Fecha:</b><small id="fechC"></small>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col">
                          <b>Contacto:</b><small id="nameC"></small>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col">
                          <b>Total:</b><small id="valueC"></small>
                      </div>
                  </div>
                </div>
              </div> 
              <input type="hidden" id="id">
              <input type="hidden" id="total">
              <input type="hidden" id="id_p">
              <div class="modal-body">
                <table class="table" id="table">
                  
                </table>
              </div>
              <div class="modal-footer">
                <div class="d-grid gap-2 d-md-block w-100">
                  <div class="row text-center">
                  
                    <?php if(in_array("Eliminar Deudas", $_SESSION['permisos'])){ ?>
                    <div class="col">
                      <button onclick="eliminarDC();" class="btn btn-danger btn-rounded btn-icon">
                      <i class="ti-trash"></i> 
                      </button><br><small class="text-danger" >Eliminar</small>
                    </div>
                    <?php } ?>
                    <?php if(in_array("Abonar Deudas", $_SESSION['permisos'])){ ?>
                    <div class="col">
                      <button class="btn btn-success btn-rounded btn-icon" id="abonoC">
                      <i class="ti-money"></i>
                      </button><br><small class="text-success">Abonar</small>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->


       