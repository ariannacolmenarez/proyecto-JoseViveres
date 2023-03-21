<div class="modal fade" id="exampleModalToggle15" aria-hidden="true" aria-labelledby="exampleModalToggleLabel15" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel15">Abono</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="form-abon">
                  <div class="form-group mt-1">
                    <h5>Fecha de la venta *</h5>
                    <input type="date" class="form-control form-control-lg" placeholder="Fecha de la Venta" name="fechaA" id="fechaA" value="<?php echo date("Y-m-d");?>">
                  </div>
                  <h5 class="mt-1">Valor de la venta *</h5>
                  <div class="input-group ">
                    <input type="number" class="form-control form-control-lg w-100 d-block" name="valorA" id="valorA">
                  </div>
                  <div class="form-group mt-3">
                    <h5>Concepto *</h5>
                    <input type="text" class="form-control form-control-lg" id="conceptoA" name="conceptoA" placeholder="Concepto">
                  </div>
                  <h5 class="mt-2">Método de pago*</h5>
                  <div class="btn-group-md text-center" role="group"> 
                      <input type="radio" class="btn-check" name="opciones" id="opciones1" value="1" checked>
                      <label class="btn btn-outline-dark" for="opciones1"><i class="ti-wallet "></i><br>Efectivo</label>

                      <input type="radio" class="btn-check" name="opciones" id="opciones2" value="2">
                      <label class="btn btn-outline-dark" for="opciones2"><i class="ti-credit-card  "></i><br>Tarjeta</label>

                      <input type="radio" class="btn-check" name="opciones" id="opciones3" value="3">
                      <label class="btn btn-outline-dark" for="opciones3"><i class="ti-desktop  "></i><br>Transferencia</label>

                      <input type="radio" class="btn-check" name="opciones" id="opciones4" value="4">
                      <label class="btn btn-outline-dark" for="opciones4"><i class="ti-money  "></i><br>Dolares</label>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <div class="d-grid gap-2 d-md-block w-100">
                  <button class="btn btn-warning w-100" type="button" id="guardar">Registrar Abono</button>
                </div>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->