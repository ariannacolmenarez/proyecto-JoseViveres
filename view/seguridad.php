
     <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row py-0">
                <div class="col-lg-10 col-sm-8 col-9 grid-margin mb-0">
                    <h2 class="font-weight-bold text-dark pt-2 m-0">Roles</h2>
                </div>
                <?php if(in_array("Consultar Roles", $_SESSION['permisos']) && $_SESSION['rol']==="3"){ ?>
                <div class="col-lg-2 col-sm-4 col-3 grid-margin mb-0 text-end">
                    <button type="button" class="text-white btn btn-success mt-2 btn-icon-text" onclick="aggRol();" title="agregar">
                        <i class="ti-plus btn-icon-prepend"></i><b class="text">Registrar Rol</b>
                    </button>
                </div>
                
            </div>
            <hr>
           
            <div class="row w-75 m-auto">
                <div class="card overflow-auto">
                    <div class="card-body">
                        <table class="table " id="list_roles">
                            

                        </table>    
                    </div>
                </div>
            </div>
            <?php } else{?>
                <div class="content-wrapper">
                    No tiene el rol de super usuario
                </div>


                <?php }?>
        </div>
    </div>
        <!-- content-wrapper ends -->    

     <script src="<?= _THEME_?>js/scripts/seguridad.js"></script>
    <?php
        require_once("view/roles.php");
    ?>

