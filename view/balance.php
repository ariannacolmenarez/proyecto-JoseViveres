    <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row py-0">
                <div class="col-lg-8 col-sm-4 col-6 grid-margin mb-0">
                  <h2 class="font-weight-bold text-dark pt-2 m-0"><?= $data['page_title']; ?></h2>
                </div>
                <?php if(in_array("Crear Ventas", $_SESSION['permisos'])){ ?>
                <div class="col-lg-2 col-sm-4 col-3 grid-margin mb-0">
                    <a href="<?= _DIRECTORY_ ?>ventas" class="text-white btn btn-success mt-2 btn-icon-text" title="Ventas" type="button" id="ventas">
                      <i class="ti-plus btn-icon-prepend"></i><b class="text">Registrar Venta</b>
                    </a>
                </div>
                <?php } ?>
                <?php if(in_array("Registrar Gastos", $_SESSION['permisos'])){ ?>
                <div class="col-lg-2 col-sm-4 col-3 grid-margin mb-0">
                  <button type="button" class="text-white btn btn-danger mt-2 btn-icon-text" id="gastos" title="Compras">
                    <i class="ti-minus btn-icon-prepend"></i><b class="text">Registrar Gasto</b>
                  </button>
              </div>
              <?php } ?>
          </div>
          <hr>
          <div class="row my-3">
            <div class="col-md-4 grid-margin">
              <select class="form-select form-select-lg  rounded-0" aria-label=".form-select-lg" id="fechas">
                <option selected="selected" value="d">Diariamente</option>
                <option value="s">Semanalmente</option>
                <option value="m">Mensualmente</option>
                <option value="a">Anualmente</option>
              </select>
            </div>
            <div class="col-md-4 grid-margin">
              <input class="form-control " type="date" placeholder=".form-control" aria-label=".form-control " id="date">
            </div>
            <?php if(in_array("Consultar Reportes Balance", $_SESSION['permisos'])){ ?>
            <div class="col-md-4 grid-margin text-end">
              <a href="<?= _DIRECTORY_ ?>reporteBalance" type="button" class="text-white btn btn-warning btn-icon-text ">
                <i class="ti-download btn-icon-prepend"></i><b>Descargar reporte</b>
              </a>
            </div>
            <?php } ?>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-primary text-xl-left">Utilidad</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" id="utility"></h3>
                    <i class="ti-stats-up icon-md text-primary mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-success text-xl-left">Ventas totales</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" id="sell"></h3>
                    <i class="ti-money icon-md text-success mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-danger text-xl-left">Gastos totales</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 "id="bills"></h3>
                    <i class="ti-money icon-md text-danger mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
          </div>
          <div class="row my-3">

            <div class="card">
              <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Ingresos</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Egresos</button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active p-2 overflow-auto" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    
                        
                        
                      
                  </div>
                  <div class="tab-pane fade p-2" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->    

<script src="<?= _THEME_?>js/scripts/balance.js"></script>
<?php
require_once("view/gastos.php");
?>

