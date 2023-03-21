<!-- modal venta -->

<div class="modal fade" id="exampleModalToggle10" aria-hidden="true" aria-labelledby="exampleModalToggleLabel10" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel10">Proveedores </h5>
                <button type="button" id="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="text" id="buscador" placeholder="Search" aria-label="Search">
                </form>
                <div class="list-group list-group-flush mt-2" id="proveedor">
                    

                </div>
                <?php if(in_array("Crear Proveedores", $_SESSION['permisos'])){ ?>
                <div class="d-grid gap-2 d-md-block w-100 mt-5">
                  <button class="btn btn-warning w-100" type="button" data-bs-target="#exampleModalToggle12" data-bs-toggle="modal">Crear Proveedor</button>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->

              <div class="modal fade" id="exampleModalToggle11" aria-hidden="true" aria-labelledby="exampleModalToggleLabel11" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel11"><a type="button" id="volver11"><i class="ti-arrow-left"></i> </a>  Modificar Proveedor</i></h5>
              </div>
              
              <div class="modal-body">
                <form id="form_provM">
                  <input type="hidden" id="id">
                  <h5 class="mt-3">Nombre *</h5>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control d-block w-100" id="nombre" name="nombrep">
                  </div>
                  <h5 class="mt-3">Contacto *</h5>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control w-100 d-block" id="contacto" name="contactop">
                  </div>
                  <h5 class="mt-3">Documento <small>(opcional)</small></h5>
                  <div class="input-group ">
                      <select class="input-group-text d-block w-25" aria-label="Default select example" id="tipo_doc" name="tipo_doc">
                          <option value="">Escoge una opción</option>
                          <option value="CI">CI</option>
                          <option value="RIF">RIF</option>
                          <option value="Otro">Otro</option>
                      </select>
                      <input type="hidden" id="tipo">
                      <input type="text" id="nro_doc" class="form-control d-block w-75" name="nro_doc" disabled>
                  </div>
                  <h5 class="mt-3">Dirección<small>(opcional)</small></h5>
                  <div class="input-group mt-2">
                    <textarea class="form-control d-block w-100" placeholder="Ingresa una descripción" id="direccion" name="direccionp" style="height: 100px"></textarea>
                  </div>
                </form>
                <div class="d-grid gap-2 d-md-block w-100 mt-5">
                  <button onclick="guardarProveedor();" class="btn btn-success w-100" type="button">Guardar Cambios</button>
                </div>
                <?php if(in_array("Eliminar Proveedores", $_SESSION['permisos'])){ ?>
                <div class="d-grid gap-2 d-md-block w-100 mt-3">
                  <button onclick="eliminarProveedor();"class="btn btn-danger w-100" type="button">Eliminar Proveedor</button>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->
              <div class="modal fade" id="exampleModalToggle12" aria-hidden="true" aria-labelledby="exampleModalToggleLabel12" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel12"><a type="button" id="volver12" data-bs-target="#exampleModalToggle10" data-bs-toggle="modal"><i class="ti-arrow-left"></i> </a>Registrar Proveedor</i></h5>
              </div>
              <div class="modal-body">
                <form id="form_prov">
                  <h5 class="mt-3">Nombre *</h5>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control d-block w-100" id="nombreR" name="nombrep">
                  </div>
                  <h5 class="mt-3">Contacto *</h5>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control w-100 d-block" id="contactoR" name="contactop">
                  </div>
                  <h5 class="mt-3">Documento <small>(opcional)</small></h5>
                  <div class="input-group w-100">
                      <select class="input-group-text w-25 d-block" aria-label="Default select example" id="tipo_docR" name="tipo_doc">
                          <option selected value="">Escoge una opción</option>
                          <option value="CI">CI</option>
                          <option value="RIF">RIF</option>
                          <option value="Otro">Otro</option>
                      </select>
                      <input type="text" id="nro_docR" class="form-control d-block w-75" name="nro_doc">
                  </div>
                  <h5 class="mt-3">Dirección<small>(opcional)</small></h5>
                  <div class="input-group mt-2">
                    <textarea id="direccionR" class="form-control d-block w-100" placeholder="Ingresa una descripción" name="direccionp"  style="height: 100px"></textarea>
                  </div>
                </form>
                <div class="d-grid gap-2 d-md-block w-100 mt-5">
                  <button onclick="registrarProveedor();"  class="btn btn-success w-100" type="button">Guardar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->
              <script src="<?= _THEME_?>js/scripts/proveedores.js"></script>