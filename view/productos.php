 <!-- partial -->
 <div class="main-panel">
        <div class="content-wrapper">
        <div class="row py-0">
            <!-- <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center"> -->
                <div class="col-lg-8 col-sm-4 col-6 grid-margin mb-0">
                  <h2 class="font-weight-bold text-dark pt-2 m-0">Productos</h2>
                </div>
                <?php if(in_array("Crear Productos", $_SESSION['permisos'])){ ?>
                <div class="col-lg-2 col-sm-4 col-3 grid-margin mb-0">
                  <button type="button" class="text-white btn btn-warning  mt-2 btn-icon-text" onclick="aggProd();">
                    <i class="ti-plus btn-icon-prepend text-dark"></i><b class="text text-dark">Registrar productos</b>
                  </button>
                </div>
                <?php } ?>
              <!-- </div>
            </div> -->
          </div>
          <hr>
            <div class="row m-0" >
                <div class="col-12" id="contend">
                    <div class="row align-items-center py-1">
                        <div class="col-12 text-end" >
                            <div class="row  text-center">
                                <div class="col p-1">
                                    <button type="button" class=" btn btn-outline-dark " id="editarCat">
                                        <b>Gestionar Categorías</b>
                                    </button>
                                </div>
                                <div class="col-1 text-center text">
                                    <div style="height: 100%;" class=" text-dark vr"></div>
                                </div>
                                <div class="col p-1">
                                    <button type="button" class=" btn btn-outline-dark " id="editarpresentacion" >
                                        <b>Gestionar Presentación</b>
                                    </button>
                                </div>
                                <div class="col-1 text-center text">
                                    <div style="height: 100%;" class=" text-dark vr"></div>
                                </div>
                                <div class="col p-1">
                                    <button type="button" class=" btn btn-outline-dark " id="editarmarca">
                                        <b>Gestionar Marcas</b>
                                    </button>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="row align-items-center mt-2">
                        <div class="col-md-7 grid-margin">
                            <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search">
                            </form>
                        </div>    
                        <div class="col grid-margin text-end">
                        <div class="card rounded">
                                <div class="card-body">
                                    <h6 class="text-secondary text-start">Total productos  <spam class="text-dark " id="totalProd"></spam></h6>                                                  
                                </div> 
                            </div>
                        </div>
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

<!-- modal venta -->

        <div class="modal fade" id="exampleModalToggle4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel4" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel4">Registrar productos </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" name="close"></button>
              </div>
              <div class="modal-body">
                <form method="post" action="#" enctype="multipart/form-data" id="form">
                  <div class="row ">
                    <div class="display-img-vid-con">
                      <div class=" mx-auto" style="width: 8rem;">
                        <img src="" id="preview-img" class="card-img-top" >
                      </div>
                    </div>
                    <h5 class="mt-2">Elige una imagen</h5>
                    <div class="input-group mb-3">
                      <input type="file" placeholder="Elige una imagen" class="form-control" accept="image/*" name="img-vid" id="inp-img-vid">
                    </div>
                    <h5 class="mt-2">Nombre del producto *</h5>
                    <div class="input-group mt-1">
                      <input type="text" class="form-control w-100 d-block" placeholder="Ej: Azucar Montalban" id="nombrep" name="nombrep">
                    </div>
                    <div class="mt-2 form-group ">
                          <h5>Busca una marca </h5>
                          <select class="form-select  shadow-none" aria-label=".form-select example" id="marca_prod" name="marcaprod">

                          </select>
                    </div>
                    <div class="mt-2 form-group ">
                          <h5>Busca una presentación </h5>
                          <select class="form-select  shadow-none" aria-label=".form-select example" id="presentacion_prod" name="presentacionprod">

                          </select>
                    </div>
                    <div class="mt-2 form-group ">
                          <h5>Busca una categoría </h5>
                          <select class="form-select  mb-3 shadow-none" aria-label=".form-select example" id="cat_prod" name="catprod">

                          </select>
                    </div>
                      <h5>Descripción <small>(opcional)</small></h5>
                    <div class="input-group mt-2">
                      <textarea class="form-control" id="descripcionp" name="descripcionp" placeholder="Ingresa una descripción" style="height: 100px"></textarea>
                    </div>
                    <div class="d-grid gap-2 d-md-block w-100 mt-5">
                      <button class="btn btn-success w-100" type="button" onclick="registrarProducto();">Registrar producto</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->
        <!-- modal venta -->

        <div class="modal fade" id="editarProd" aria-hidden="true" aria-labelledby="editarProdLabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-fullscreen w-100">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="editarProdLabel">Modificar producto </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" name="close" id="close"></button>
              </div>
              <div class="modal-body">
                <form method="post" id="form2" action="#" enctype="multipart/form-data">
                  <input type="hidden" id="idE">
                  <div class="row ">
                    <div class="display-img-vid-con">
                      <div class=" mx-auto" style="width: 8rem;">
                        <img src="" id="preview-imgE" class="card-img-top" >
                      </div>
                    </div>
                    <h5 class="mt-2">Elige una imagen</h5>
                    <div class="input-group mb-3">
                      <input type="file" placeholder="Elige una imagen" class="form-control" accept="image/*" name="img-vid" id="inp-img-vidE">
                    </div>
                    <h5 class="mt-2">Nombre del producto *</h5>
                    <div class="input-group mt-1">
                      <input type="text" class="form-control w-100 d-block" placeholder="Ej: Azucar Montalban" id="nombreE" name="nombrep">
                    </div>
                    <div class="mt-2 form-group ">
                          <h5>Busca una marca </h5>
                          <select class="form-select shadow-none" aria-label=".form-select example" id="marca_prodE" name="marcaprod">

                          </select>
                    </div>
                    <div class="mt-2 form-group ">
                          <h5>Busca una presentación </h5>
                          <select class="form-select shadow-none" aria-label=".form-select example" id="presentacion_prodE" name="presentacionprod">

                          </select>
                    </div>
                    <div class="mt-2 form-group ">
                          <h5>Busca una categoría </h5>
                          <select class="form-select  mb-3 shadow-none" aria-label=".form-select example" id="cat_prodE" name="catprod">

                          </select>
                    </div>
                      <h5>Descripción <small>(opcional)</small></h5>
                    <div class="input-group mt-2">
                      <textarea class="form-control" id="descripcionE" name="descripcionp" placeholder="Ingresa una descripción"  style="height: 100px"></textarea>
                    </div>
                    <div class="d-grid gap-2 d-md-block w-100 mt-5">
                      <button class="btn btn-success w-100" type="button" onclick="guardarProducto();">Guardar Cambios</button>
                    </div>
                    
                    <?php if(in_array("Eliminar Productos", $_SESSION['permisos'])){ ?>
                    <div class="d-grid gap-2 d-md-block w-100 mt-2">
                      <button class="btn btn-danger w-100" type="button" onclick="eliminarProducto();">Eliminar Producto</button>
                    </div>
                    <?php } ?>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
              <!-- modal ends -->

              <script src="<?= _THEME_?>js/scripts/productos.js"></script>
<?php
require_once("view/marca.php");
require_once("view/categoria.php");
require_once("view/presentacion.php");
?>
