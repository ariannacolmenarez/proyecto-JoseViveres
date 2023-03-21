 <!-- modal gasto -->
 <div class="modal fade" id="ingresosR" aria-hidden="true" aria-labelledby="ingresosRLabel" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-fullscreen w-100">
                  <div class="modal-header text-center">
                    <h5 class="modal-title fs-5 display-6 fw-bold" id="ingresosRLabel">Registrar Ingreso <i class="ti-shopping-cart"></i></h5>
                    <button type="button" class="btn-close" id="close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="ingreso_form">
                      <div class="form-group mt-3">
                          <h5>Fecha *</h5>
                          <input type="date" class="form-control" id="fechaI" name="fechaI" placeholder="Fecha del ingreso"  value="<?php echo date("Y-m-d");?>" disabled>
                      </div>
                      <div class="form-group mt-3">
                          <h5>Numero de Factura</h5>
                          <input type="text" class="form-control" id="nro_fac" name="nro_fac" placeholder="Numero de la factura">
                      </div>
                      <div class="form-group mt-3">
                          <h5>Fecha de la Factura *</h5>
                          <input type="date" class="form-control" id="fecha_fac" name="fecha_fac" placeholder="Fecha de la factura" >
                      </div>
                      <h5>Estado de la Factura *</h5>
                      <div class="btn-group-lg text-center" role="group" aria-label="Basic radio toggle button group" id="estado_fac">
                        <input type="radio" class="btn-check " name="estado" id="estado1" autocomplete="off" value="PAGADA" checked>
                        <label class="btn btn-outline-success" for="estado1">Pagada</label>
                        <input type="radio" class="btn-check " name="estado" id="estado2" autocomplete="off" value="A CREDITO">
                        <label class="btn btn-outline-danger" for="estado2">A crédito</label>
                      </div>
                      <div class="mt-3 form-group ">
                          <h5>Agregar un proveedor</h5>
                          <select class="form-select  mb-3 shadow-none" id="proveedorv" name="proveedorv"  aria-label=".form-select example">
                              <option selected="selected" disabled>Selecciona un proveedor</option>
                
                          </select>
                      </div>
                      
                      <h5 class="mt-3">Método de pago*</h5>
                      <div class="btn-group-md text-center" role="group" id="metodoI" >
                          
                          <input type="radio" class="btn-check" name="metodo" id="option1" autocomplete="off" value="1">
                          <label class="btn btn-outline-dark" for="option1"><i class="ti-wallet "></i><br>Efectivo</label>

                          <input type="radio" class="btn-check" name="metodo" id="option2" autocomplete="off" value="2">
                          <label class="btn btn-outline-dark" for="option2"><i class="ti-credit-card  "></i><br>Tarjeta</label>

                          <input type="radio" class="btn-check" name="metodo" id="option3" autocomplete="off" value="3">
                          <label class="btn btn-outline-dark" for="option3"><i class="ti-desktop  "></i><br>Transferencia</label>

                          <input type="radio" class="btn-check" name="metodo" id="option4" autocomplete="off" value="4">
                          <label class="btn btn-outline-dark" for="option4"><i class="ti-money  "></i><br>Dolares</label>
                      </div>
                    </form>
                      <hr>
                      <h5 class="mt-3">Agregar productos</h5>
                      <hr>
                      <div id="table">

                      </div>
                      <div class="d-grid gap-2 d-md-block w-100">
                        <button class="btn btn-success w-100" onclick="formProd();" type="button" >Agg productos</button>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <div class="d-grid gap-2 d-md-block w-100">
                      <button class="btn btn-warning w-100" onclick="registrarIngreso();" type="button">Registrar Ingreso</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!-- modal ends -->

              <div class="modal fade" id="ingresosE" aria-hidden="true" aria-labelledby="ingresosELabel" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-fullscreen w-100">
                  <div class="modal-header text-center">
                    <h5 class="modal-title fs-5 display-6 fw-bold" id="ingresosELabel">Consultar Ingreso <i class="ti-shopping-cart"></i></h5>
                    <button type="button" class="btn-close" id="close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="card m-auto mt-2" style="width: 20rem;">
                      <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <b>Fecha:    </b><small id="fechaIE"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Número de Factura:    </b><small id="nro_facE"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Fecha Factura:    </b><small  id="fecha_facE"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Estado de la Factura:    </b><small id="estado_facE"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Proveedor:    </b><small id="proveedorvE"></small>
                            </div>
                        </div>
                        
                      </div>
                    </div> 
                    <!-- <form id="ingreso_formE">
                      <div class="form-group mt-3">
                          <h5>Fecha *</h5>
                          <input type="date" class="form-control"  name="fechaIE" placeholder="Fecha del ingreso"  value="<?php echo date("Y-m-d");?>">
                      </div>
                      <div class="form-group mt-3">
                          <h5>Numero de Factura</h5>
                          <input type="text" class="form-control"  name="nro_facE" placeholder="Numero de la factura">
                      </div>
                      <div class="form-group mt-3">
                          <h5>Fecha de la Factura *</h5>
                          <input type="date" class="form-control"  name="fecha_facE" placeholder="Fecha de la factura" >
                      </div>
                      <h5>Estado de la Factura *</h5>
                      <div class="btn-group-lg text-center" role="group" aria-label="Basic radio toggle button group" >
                        <input type="radio" class="btn-check " name="estadoE" id="estado1" autocomplete="off" value="PAGADA" checked>
                        <label class="btn btn-outline-success" for="estado1">Pagada</label>
                        <input type="radio" class="btn-check " name="estadoE" id="estado2" autocomplete="off" value="A CREDITO">
                        <label class="btn btn-outline-danger" for="estado2">A crédito</label>
                      </div>
                      <div class="mt-3 form-group ">
                          <h5>Agregar un proveedor</h5>
                          <select class="form-select  mb-3 shadow-none"  name="proveedorvE"  aria-label=".form-select example">
                              <option selected="selected" disabled>Selecciona un proveedor</option>
                
                          </select>
                      </div> -->
                      <hr>
                      <h5 class="mt-3">Productos</h5>
                      <hr>
                      <div id="tableEditar">

                      </div>
                      <!-- <input type="hidden" id="idE">
                      <div class="d-grid gap-2 d-md-block w-100">
                        <button class="btn btn-success w-100" onclick="formProdE();" type="button" >Agg productos</button>
                      </div> -->
                    <!-- </form> -->
                  </div>
                  <!-- <div class="modal-footer">
                    <div class="d-grid gap-2 d-md-block w-100">
                      <button class="btn btn-warning w-100" onclick="guardarIngreso();" type="button">Guardar Ingreso</button>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
              <!-- modal ends -->