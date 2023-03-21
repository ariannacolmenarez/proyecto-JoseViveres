
     <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row py-0">
            <!-- <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center"> -->
                <div class="col-lg-8 col-sm-4 col-6 grid-margin mb-0">
                  <h2 class="font-weight-bold text-dark pt-2 m-0">Inventario</h2>
                </div>
                <?php if(in_array("Crear Ingresos", $_SESSION['permisos'])){ ?>
                <div class="col-lg-2 col-sm-4 col-3 grid-margin mb-0 text-end">
                  <a type="button" class="text-white btn btn-warning  mt-2 btn-icon-text" href="<?= _DIRECTORY_ ?>ingreso">
                    <i class="ti-plus btn-icon-prepend text-dark"></i><b class="text text-dark">Ingresar producto</b>
                  </a>
                </div>
                <?php } ?>
          </div>
          <hr>
            <div class="row m-0" >
                <div class="col-12" id="contend">
                    <div class="row align-items-center text-end py-1">
                        <div class="col-md-4 ">
                            <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search">
                            </form>
                        </div>
                        <div class="col-4 text-end" >
                            <div class="row  text-end">
                                <div class="col-1 text-center text">
                                    <div style="height: 100%;" class=" text-dark vr"></div>
                                </div>
                                <div class="col p-1">
                                    <select class="form-select btn-outline-dark rounded-0" aria-label=".form-select" id="catProd">
                                        <option selected="selected" value="">Ver todas las categorías</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="card rounded">
                                <div class="card-body">
                                    <h6 class="text-secondary text-start">Total productos  <spam class="text-dark " id="totalProd"></spam></h6>                                                  
                                </div> 
                            </div>
                        </div> -->
                        
                    </div>
                    <div class="text-center fs-2 mt-4" id="sin_producto">
                        
                    </div>
                    <div class="row row-cols-1 row-cols-lg-8 row-cols-sm-6 g-3 overflow-auto m-0"  id="lista_producto">
                        
                    </div>

                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
</div>
<script src="<?= _THEME_?>js/scripts/inventario.js"></script>
<?php
require_once("view/categoria.php");

?>
