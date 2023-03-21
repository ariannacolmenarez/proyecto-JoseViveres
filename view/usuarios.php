<!-- modal venta -->

<div class="modal fade" id="exampleModalToggle26" aria-hidden="true" aria-labelledby="exampleModalToggleLabel26" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel26">Usuarios </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" id="buscadorU" type="search" placeholder="Search">
                </form>
                <div class="list-group list-group-flush mt-2" id="list_usuarios">

                </div>
                <?php if(in_array("Crear Usuarios", $_SESSION['permisos'])){ ?>
                <div class="d-grid gap-2 d-md-block w-100 mt-5">
                  <button class="btn btn-warning w-100" type="button" onclick="crearUsuario();">Registrar usuarios</button>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->

        <div class="modal fade" id="exampleModalToggle16" aria-hidden="true" aria-labelledby="exampleModalToggleLabel16" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel26">Modificar Usuario </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              
              
              <div class="modal-body">
                <form id="userform2" >
                  <input type="hidden" id="con">
                  <input type="hidden" id="idusuarios">
                  <h5 class="mt-3">Nombre *</h5>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control d-block w-100" id="nombre1" name="nombre" name="nombre">
                  </div>
                  <h5 class="mt-3">correo *</h5>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control d-block w-100" id="correo" data-bs-whatever="@gmail" name="correo">
                  </div>
                  <h5 class="mt-3">Rol de usuario*</h5>
                  <div class="input-group mt-1">
                    <select class="form-select d-block w-100 rounded-0" id="rol_usuario" name="rol">
                      <option selected>Elige el rol</option>
                    
                    </select>
                  </div>
                  <hr>
                  <h4 class="mt-3"> <b>Cambiar contraseña</b></h4>
                  <hr>
                  <h5 class="mt-3">Nueva contraseña </h5>
                  <div class="input-group mt-1">
                      <input type="password"  class="form-control d-block w-100" id="contraseña" name="password" >
                  </div>
                  <h5 class="mt-3">Confirmar contraseña </h5>
                  <div class="input-group mt-1">
                    <input type="password" class="form-control d-block w-100" id="contraseñaV" name="password_conf">
                  </div>
                  <div class="d-grid gap-2 d-md-block w-100 mt-5">
                    <button onclick="guardarUsuarios();" class="btn btn-success w-100" type="button">Guardar Cambios</button>
                  </div>
                  <?php if(in_array("Eliminar Usuarios", $_SESSION['permisos'])){ ?>
                    <div class="d-grid gap-2 d-md-block w-100 mt-3">
                      <button onclick="eliminarUsuarios();" class="btn btn-danger w-100" type="button">Eliminar Usuario</button>
                    </div>
                  <?php } ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
              <!-- modal ends -->
              <div class="modal fade" id="exampleModalToggle27" aria-hidden="true" aria-labelledby="exampleModalToggleLabel27" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
            <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel26">Registrar Usuario </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form id="userform">
              <div class="modal-body">
                <h5 class="mt-3">Nombre *</h5>
                <div class="input-group mt-1">
                  <input type="text" class="form-control d-block w-100" id="nombre3" name="nombre"  >
                </div>
                <h5 class="mt-3">correo *</h5>
                <div class="input-group mt-1">
                  <input type="text" class="form-control d-block w-100" id="correo2" name="correo" data-bs-whatever="@gmail" >
                </div>
                <h5 class="mt-3">contraseña *</h5>
                <div class="input-group mt-1">
                  <input type="password" value="" class="form-control d-block w-100" name="password2" id="contraseña1">
                </div>
                <h5 class="mt-3">Confirmar contraseña *</h5>
                <div class="input-group mt-1">
                  <input type="password" value="" class="form-control d-block w-100" name="password_conf" id="contraseña2">
                </div>
                <h5 class="mt-3">Rol de usuario*</h5>
                <div class="input-group mt-1">
                  <select class="form-select d-block w-100  rounded-0" name="rol" id="rol_usuarioR">
                  <option selected>Elige el rol</option>
                  
                  </select>
                </div>
                </form>

                <div class="d-grid gap-2 d-md-block w-100 mt-5">
                  <button id="button" onclick="registrarUsuarios();" class="btn btn-success w-100" type="button">Guardar</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
              <!-- modal ends -->
              <script src="<?= _THEME_?>js/scripts/usuario.js"></script>