<div class="modal fade" id="perfil" aria-hidden="true" aria-labelledby="perfilLabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="perfilLabel">Perfil de Usuario </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              
              
              <div class="modal-body">
                <form id="perfilform" >
                <input type="hidden" id="con1" value="<?= empty($_SESSION['clave']) ? ' ' : $_SESSION['clave'] ?>">
                  <input type="hidden" id="idusuarios" value="<?= $_SESSION['id_usuario']?>">
                  <h5 class="mt-3">Nombre *</h5>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control d-block w-100" id="nombrePerfil" name="nombrePerfil"  value="<?= empty($_SESSION['usuario']) ? '' : $_SESSION['usuario'] ?>">
                  </div>
                  <h5 class="mt-3">correo *</h5>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control d-block w-100" id="correoPerfil" data-bs-whatever="@gmail" name="correoPerfil" value="<?= empty($_SESSION['correo']) ? ' ' : $_SESSION['correo'] ?>">
                  </div>
                  <hr>
                  <h4 class="mt-3"> <b>Cambiar contraseña</b></h4>
                  <hr>
                  <h5 class="mt-3">Nueva contraseña </h5>
                  <div class="input-group mt-1">
                      <input type="password"  class="form-control d-block w-100" id="contraseñaPerfil" name="passwordPerfil" >
                  </div>
                  <h5 class="mt-3">Confirmar contraseña </h5>
                  <div class="input-group mt-1">
                    <input type="password" class="form-control d-block w-100" id="contraseñaVPerfil" name="password_confPerfil">
                  </div>
                  <div class="d-grid gap-2 d-md-block w-100 mt-5">
                    <button onclick="guardar();" class="btn btn-success w-100" type="button">Guardar Cambios</button>
                  </div>
                  <input type="hidden" id="idPerfil" value="<?= empty($_SESSION['id_usuario']) ? 'USUARIO' : $_SESSION['id_usuario'] ?>">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
              <!-- modal ends -->
              <script src="<?= _THEME_ ?>js/scripts/perfil.js"></script>