
     <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row py-0">
                <div class="col-lg-10 col-sm-8 col-9 grid-margin mb-0">
                    <h2 class="font-weight-bold text-dark pt-2 m-0">Ingreso de Productos</h2>
                </div>
                <?php if(in_array("Crear Ingresos", $_SESSION['permisos'])){ ?>
                <div class="col-lg-2 col-sm-4 col-3 grid-margin mb-0 text-end">
                    <button type="button" class="text-white btn btn-success mt-2 btn-icon-text" onclick="regisIngreso();" title="agregar">
                        <i class="ti-plus btn-icon-prepend"></i><b class="text">Registrar</b>
                    </button>
                </div>
                <?php } ?>
            </div>
            <hr>

            <div class="row w-75 m-auto">
                <div class="card">
                    <div class="card-body">
                        <table class="table" id="list_ingresos">
                            

                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- content-wrapper ends -->    

     <script src="<?= _THEME_?>js/scripts/ingreso.js"></script>
    <?php
        require_once("view/ingreso.php");
    ?>

