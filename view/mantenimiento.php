<?php if(isset($_SESSION['mensaje'])){
    if ($_SESSION['mensaje']!="") {
       ?>
            <script c_mensaje="<?= $_SESSION['mensaje'] ;?>" c_tipo_mensaje="<?= $_SESSION['tipo_mensaje'] ;?>"> 
                var mensaje = document.currentScript.getAttribute("c_mensaje");
                var tipo = document.currentScript.getAttribute("c_tipo_mensaje");
                // $(document).ready(function(){
                    var toastMixin = Swal.mixin({
                        toast: true,
                        icon: 'success',
                        title: 'General Title',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    toastMixin.fire({
                        animation: true,
                        title: mensaje
                    });
                // });
            </script>
        <?php 
            unset($_SESSION['mensaje']);
            unset($_SESSION['tipo_mensaje']);
        } 
    }?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row py-0">
                <div class="col-lg-10 col-sm-8 col-9 grid-margin mb-0">
                    <h2 class="font-weight-bold text-dark pt-2 m-0">Mantenimiento</h2>
                </div>
            </div>
            <hr>
            <div class="row w-75 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row align-center">
                    <?php if(in_array("Crear Respaldo Base Datos", $_SESSION['permisos'])){ ?>
                        <div class="col-lg-6 col-md-6 col-xs-12 text-center py-2 ">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-copy fa-9x text-muted"></i>
                                    <h5 class="mt-2 text-dark fs-4">Respaldar Base de Datos</h5>
                                    <small>Crear un archivo de respaldo con la información de la base de datos</small>
                                    <a id="respaldo" >
                                        <button class="mt-2 btn btn-outline-warning w-100">Respaldar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(in_array("Modificar Base Datos", $_SESSION['permisos'])){ ?>
                        <div class="col-lg-6 col-md-6 col-xs-12 text-center py-2 ">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-trash-restore fa-9x text-muted"></i>
                                    <h5 class="mt-2 fs-4 text-dark">Restaurar Base de Datos</h5>
                                    <small>Cargar la base de datos desde una copia de seguridad creada anteriormente</small>
                                     <button class="mt-2 btn btn-outline-warning w-100" data-bs-target="#exampleModalToggle21" data-bs-toggle="modal">Restaurar</button>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
        <!-- content-wrapper ends -->    
        <div class="modal fade" id="exampleModalToggle21" aria-hidden="true" aria-labelledby="exampleModalToggleLabel21" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel21">Restaurar Base de Datos </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="card">
                    <div class="card-body text-center">
                        <form method="POST" action="<?= _DIRECTORY_?>mantenimiento/restaurar" id="form_res">
                                <div class="form-group col">
                                    <label for="cargo" ><b>Seleccione Archivo</b></label>
                                    <select class="form-control bg-light" name="sql" id="sql">
                                        <option value="" selected disabled>seleccionar</option>
                                    </select>
                                </div>
                                <button id="restaurar" class="btn btn-warning mt-2 mr-2">
                                    Restaurar
                                </button>
                            </form>
                    </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>

        <script>
            $(document).ready(function(){
                $.ajax({
                    type: "POST",
                    url: "mantenimiento/select",
                    dataType: "html",
                    success: function (response) {
                        $('#sql').prepend(response);
                    },
                    error: (response) => {
                        console.log(response);
                    }
                });
            })
        </script>
    <script src="<?= _THEME_?>js/scripts/alerts/mantenimiento.js"></script>