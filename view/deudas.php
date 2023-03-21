<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row py-0">
            <div class="col-lg-8 col-sm-4 col-6 grid-margin mb-0">
              <h2 class="font-weight-bold text-dark pt-2 m-0">Cuentas</h2>
            </div> 
          </div>
          <hr>
          <div class="row w-75 m-auto">
            <div class="card">
              <div class="card-body">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                      <p class="card-title text-md-center text-danger text-xl-left">Cuentas por Pagar</p>
                      <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                          <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" id="totalP"></h3>
                          <i class="ti-money icon-md text-danger mb-0 mb-md-3 mb-xl-0"></i>
                      </div> 
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"> <p class="card-title text-md-center text-success text-xl-left">Cuentas por Cobrar</p>
                      <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 text-center" id="totalC"></h3>
                        <i class="ti-money icon-md text-success mb-0 mb-md-3 mb-xl-0"></i>
                      </div>
                    </button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="text-center fs-2 mt-4" id="sin_deudasp">
                        
                    </div>
                    <div class="list-group list-group-flush mt-2" id="lista_deudasP"> 
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="text-center fs-2 mt-4" id="sin_deudasc">
                        
                    </div>
                    <div class="list-group list-group-flush mt-2" id="lista_deudasC">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- content-wrapper ends -->     
        
        <?php
require_once("view/gastos.php");
require_once("view/deudasCobrar.php");
require_once("view/deudasPagar.php");
?>
  <script src="<?= _THEME_?>js/scripts/deudas.js"></script>


