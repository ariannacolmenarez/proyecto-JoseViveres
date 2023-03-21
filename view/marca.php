<!-- modal venta -->

<div class="modal fade" id="marca" aria-hidden="true" aria-labelledby="marcalabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="marcalabel">Registrar Marca <i class="ti-tag"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="marca_form">
                  <h5 class="mt-2">Nombre de la marca *</h5>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control form-control-lg w-100 d-block" id="nombreM" name="nombreM">
                  </div>
                </form>
                <div class="d-grid gap-2 d-md-block w-100 mt-5">
                  <button class="btn btn-warning w-100" type="button" onclick="registrarmarca();" >Registrar Marca</button>
                </div>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->
              <div class="modal fade" id="list_marca" aria-hidden="true" aria-labelledby="list_marcalabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="list_marcalabel">Marcas <i class="ti-tag"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchmarca">
                </form>
                <div class="list-group list-group-flush mt-2" id="lista_marca">
                    
                </div>
                <?php if(in_array("Crear Marcas", $_SESSION['permisos'])){ ?>
                <div class="d-grid gap-2 d-md-block w-100 mt-5">
                  <button class="btn btn-warning w-100" type="button" id="registrarmarca" >Registrar Marca</button>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->

              <div class="modal fade" id="mod_marca" aria-hidden="true" aria-labelledby="mod_marcalabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="mod_marcalabel">Modificar Marca <i class="ti-tag"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              
              <div class="modal-body">
                <form id="marca_formM">
                  <input type="hidden" id="idmarcaE">
                    <h5 class="mt-2">Nombre de la Marca *</h5>
                    <div class="input-group mt-1">
                      <input type="text" class="form-control w-100 d-block" id="nombremarcaE" name="nombremarca">
                    </div>
                </form>
      
                <div class="d-grid gap-2 d-md-block w-100 mt-5">
                  <button class="btn btn-success w-100" type="button" onclick="guardarmarca();">Guardar Cambios</button>
                </div>
                
                <?php if(in_array("Eliminar Marcas", $_SESSION['permisos'])){ ?>
                <div class="d-grid gap-2 d-md-block w-100 mt-3">
                  <button class="btn btn-danger w-100" type="button" onclick="eliminarmarca();">Eliminar Marca</button>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->
        <script src="<?= _THEME_?>js/scripts/marca.js"></script>