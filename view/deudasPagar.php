        
        <div class="modal fade" id="exampleModalToggle17" aria-hidden="true" aria-labelledby="exampleModalToggleLabel17" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
            <div class="modal-header text-center">
                  <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel13">Cuenta Por Pagar </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="deudasP" data-bs-toggle="tab" data-bs-target="#deudasP-pane" type="button" role="tab" aria-controls="deudasP-pane" aria-selected="true">
                      <p class="card-title text-md-center text-danger text-xl-left">Cuentas</p> 
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="abonosP-tab" data-bs-toggle="tab" data-bs-target="#abonosP-tab-pane" type="button" role="tab" aria-controls="abonosP-tab-pane" aria-selected="false"> 
                      <p class="card-title text-md-center text-success text-xl-left">Abonos</p>
                    </button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="deudasP-pane" role="tabpanel" aria-labelledby="deudasP" tabindex="0">
                    <h5 class="m-auto p-2 text-center"id="nombreD"></h5>
                    <div class="card m-auto mt-1 p-3" style="width: 18rem;">
                      <p class="card-title text-md-center text-dark text-xl-left"><span class="badge bg-success rounded-pill" id="cantD"></span> Cuentas</p>
                      <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"id="montoD"></h3>
                        <i class="ti-money icon-md text-success mb-0 mb-md-3 mb-xl-0"></i>
                      </div>
                    </div> 
                    <div class="list-group list-group-flush mt-2" id="lista_pagar">
                      
                    </div>
                  </div>
                  <div class="tab-pane fade" id="abonosP-tab-pane" role="tabpanel" aria-labelledby="abonosP-tab" tabindex="0">
                    <h4 class="m-auto p-2 text-center">Abonos</h4>
                    <div class="list-group list-group-flush mt-2" id="lista_abonosp">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->
        <div class="modal fade" id="exampleModalToggle18" aria-hidden="true" aria-labelledby="exampleModalToggleLabel18" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel18">Resumen </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>       
              <div class="modal-body">
                <div class="card m-auto mt-2" style="width: 25rem;">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <small>Concepto:</small><br> <b id="conceptoP"></b> 
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col">
                          <small>Valor Total:</small><br> <b class="fs-4" id="montoP"></b> 
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                          <small>Categoría:</small>
                        </div>
                        <div class="col text-end">
                          <b id="categoria"></b>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                          <small>Fecha:</small>
                        </div>
                        <div class="col text-end">
                          <b id="fechaP"></b> 
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                          <small>Método de pago:</small>
                        </div>
                        <div class="col text-end">
                          <b>deuda</b>
                        </div>
                    </div>
                    <input type="hidden" id="id">
                    <input type="hidden" id="total">
                    <input type="hidden" id="id_p">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="d-grid gap-2 d-md-block w-100">
                  <div class="row text-center">
                  
                      <?php if(in_array("Eliminar Deudas", $_SESSION['permisos'])){ ?>
                      <div class="col">
                        <button onclick="eliminarDP();" class="btn btn-danger btn-rounded btn-icon">
                        <i class="ti-trash"></i> 
                        </button><br><small class="text-danger">Eliminar</small>
                      </div>
                      <?php } ?>
                      <?php if(in_array("Abonar Deudas", $_SESSION['permisos'])){ ?>
                      <div class="col">
                        <button class="btn btn-success btn-rounded btn-icon"id="abonoP">
                        <i class="ti-money"></i>
                        </button><br><small class="text-success" >Abonar</small>
                      </div>
                      <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->
<?php 
require_once("view/abono.php");
?>
        

        
              