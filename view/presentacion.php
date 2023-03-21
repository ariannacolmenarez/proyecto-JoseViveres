<!-- modal venta -->

<div class="modal fade" id="reg_presentacion" aria-hidden="true" aria-labelledby="reg_presentacionlabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">

              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="reg_presentacionlabel">Registrar Presentación <i class="ti-tag"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="presentacion_form">
                  <h5 class="mt-2">Presentación *</h5>
                  <div class="input-group mb-3" name="presentacion">
                    <input type="text" aria-label="First name" class="form-control" placeholder="Volumen Ej: 1" id="volumen">
                    <select class="form-select" id="medidas">
                      <option value="UNIDAD">UNIDAD</option>
                      <option value="KG">KG</option>
                      <option value="G">G</option>
                      <option value="MG">MG</option>
                      <option value="KL">kL</option>
                      <option value="L">L</option>
                      <option value="ML">ML</option>
                    </select>
                    <span class="input-group-text"> * </span>
                    <input type="text" aria-label="First name" class="form-control" placeholder="Unidades Ej: 1" id="unidades">
                    <span class="input-group-text"> und </span>
                  </div>
                </form>
                <div class="d-grid gap-2 d-md-block w-100 mt-5">
                  <button class="btn btn-warning w-100" type="button" onclick="registrarpresentacion();" >Registrar Presentacion</button>
                </div>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->
              <div class="modal fade" id="list_presentacion" aria-hidden="true" aria-labelledby="list_presentacionlabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="list_presentacionlabel">Presentaciones <i class="ti-tag"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush mt-2" id="lista_presentacion">
                    
                </div>
                <?php if(in_array("Crear Presentaciones", $_SESSION['permisos'])){ ?>
                <div class="d-grid gap-2 d-md-block w-100 mt-5">
                  <button class="btn btn-warning w-100" type="button" id="registrarpresentacion" >Registrar Presentación</button>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->

              <div class="modal fade" id="mod_presentacion" aria-hidden="true" aria-labelledby="mod_presentacionlabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="mod_presentacionlabel">Modificar Presentación <i class="ti-tag"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close"></button>
              </div>
              
              <div class="modal-body">
              <form id="presentacion_formM">
                <input type="hidden" id="presentacionE">
                  <h5 class="mt-2">Presentación *</h5>
                  <div class="input-group mb-3" name="presentacion">
                    <input type="number" aria-label="First name" class="form-control" placeholder="Volumen Ej: 1" id="volumenE">
                    <select class="form-select" id="medidasE">
                      <option value="UNIDAD">UNIDAD</option>
                      <option value="KG">KG</option>
                      <option value="G">G</option>
                      <option value="MG">MG</option>
                      <option value="KL">kL</option>
                      <option value="L">L</option>
                      <option value="ML">ML</option>
                    </select>
                    <span class="input-group-text"> * </span>
                    <input type="number" aria-label="First name" class="form-control" placeholder="Unidades Ej: 1" id="unidadesE">
                    <span class="input-group-text"> und </span>
                  </div>
                </form>
      
                <div class="d-grid gap-2 d-md-block w-100 mt-5">
                  <button class="btn btn-success w-100" type="button" onclick="guardarpresentacion();">Guardar Cambios</button>
                </div>
                
                <?php if(in_array("Eliminar Presentaciones", $_SESSION['permisos'])){ ?>
                <div class="d-grid gap-2 d-md-block w-100 mt-3">
                  <button class="btn btn-danger w-100" type="button" onclick="eliminarPresentacion();">Eliminar presentación</button>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->
        <script src="<?= _THEME_?>js/scripts/presentacion.js"></script>