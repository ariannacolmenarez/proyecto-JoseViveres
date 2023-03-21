 <!-- modal gasto -->
 <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-fullscreen w-100">
                  <div class="modal-header text-center">
                    <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel2">Registrar Gasto <i class="ti-shopping-cart"></i></h5>
                    <button type="button" class="btn-close" id="close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="spentform">
                      <div class="btn-group-lg text-center" role="group" aria-label="Basic radio toggle button group" id="estadov">
                        <input type="radio" class="btn-check " name="estado" id="estado1" autocomplete="off" value="PAGADA" checked>
                        <label class="btn btn-outline-success" for="estado1">Pagada</label>
                        <input type="radio" class="btn-check " name="estado" id="estado2" autocomplete="off" value="A CREDITO">
                        <label class="btn btn-outline-danger" for="estado2">A crédito</label>
                      </div>
                      <div class="form-group mt-3">
                          <h5>Agregar nombre al gasto <small>(opcional)</small></h5>
                          <input type="text" class="form-control" id="nombrev" name="nombrev" placeholder="Nombre del gasto">
                      </div>
                      <div class="mt-3 form-group ">
                          <h5>Asignar Categoría del gasto*</h5>
                          <div>
                            <select class="form-select  mb-3 shadow-none" id="cat" name="cat" aria-label=".form-select example">
                              <option selected="selected" disabled>Selecciona una categoría</option>
                              
                            </select>
                          </div>
                      </div>
                      <div class="form-group mt-3">
                          <h5>Fecha del gasto *</h5>
                          <input type="date" class="form-control" id="fechav" name="fechav" placeholder="Fecha de la Venta"  value="<?php echo date("Y-m-d");?>">
                      </div>
                      <div class="form-group mt-3">
                          <h5>Hora del gasto *</h5>
                          <input type="time" class="form-control" id="horav" name="horav" placeholder="Hora de la Venta"  value="<?php ini_set('date.timezone','America/Caracas'); echo date("H:i");?>">
                      </div>
                      <h5 class="mt-3">Valor del gasto *</h5>
                      <div class="input-group ">
                        <input type="text" class="form-control w-100 d-block" id="montov" name="montov" aria-label="Dollar amount (with dot and two decimal places)">
                      </div>
                      <h5 class="mt-3">Método de pago*</h5>
                      <div class="btn-group-md text-center" role="group" id="metodov">
                          
                          <input type="radio" class="btn-check" name="metodo" id="option1" autocomplete="off" value="1">
                          <label class="btn btn-outline-dark" for="option1"><i class="ti-wallet "></i><br>Efectivo</label>

                          <input type="radio" class="btn-check" name="metodo" id="option2" autocomplete="off" value="2">
                          <label class="btn btn-outline-dark" for="option2"><i class="ti-credit-card  "></i><br>Tarjeta</label>

                          <input type="radio" class="btn-check" name="metodo" id="option3" autocomplete="off" value="3">
                          <label class="btn btn-outline-dark" for="option3"><i class="ti-desktop  "></i><br>Transferencia</label>

                          <input type="radio" class="btn-check" name="metodo" id="option4" autocomplete="off" value="4">
                          <label class="btn btn-outline-dark" for="option4"><i class="ti-money  "></i><br>Dolares</label>
                      </div>
                      <div class="mt-3 form-group ">
                          <h5>Agregar un proveedor <small>(opcional)</small></h5>
                          <select class="form-select  mb-3 shadow-none" id="proveedorv" name="proveedorv"  aria-label=".form-select example">
                              <option selected="selected" disabled>Selecciona un proveedor</option>
                
                          </select>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <div class="d-grid gap-2 d-md-block w-100">
                      <button class="btn btn-warning w-100" onclick="registrarGasto();" type="button">Confirmar Gasto</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!-- modal ends -->
              <script src="<?= _THEME_?>js/scripts/gastos.js"></script>