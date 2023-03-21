
     <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row m-0 align-items-center">
                    <div class="col-1">
                        <a href="<?= _DIRECTORY_ ?>balance" class="btn btn-warning btn-icon-text"><i class="ti-arrow-left"></i></a>
                    </div>
                    <div class="col">
                        <h3 class="font-weight-bold text-dark text py-2">Registrar Venta</h3> 
                    </div>
            </div>
  <hr>
            <div class="row m-0" >
                <div class="col-12 p-0 col-sm-8">
                    <div class="row ">
                        <div class="col-md-5 grid-margin">
                            <select class="form-select form-select-lg  rounded-0" aria-label=".form-select-lg" id="cat">
                            <option value="" selected="selected">Categorías</option>
                            
                            </select>
                        </div>
                        <div class="col-md-7 grid-margin">
                            <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" id="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                    </div>
                    <div class="text-center fs-2" id="sin_prod">
                        
                    </div>
                    <div class="overflow-auto" id="lista_prod" style="height: 600px;">
                        
                    </div>
                </div>
                <div class="col-12 p-0 col-sm-4">
                    <div class="card text-center "  >
                        <div class="card-header bg-white">
                            <div class="row">
                                <div class="col text-start p-2">
                                    <p class="fs-4">CANASTA</p>
                                </div>
                                <div class="col text-end">
                                    <a href="#" onclick="vaciarCanasta();" class="fs-6">Vaciar canasta</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body overflow-auto" style="height: 550px;" id="canasta">
                        
                        </div>
                        <div class="card-footer bg-white" >
                            <div class="row">
                                <div class="col">
                                    <h6>Total</h6>
                                </div>
                                <div class="col">
                                    <h6 id="monto"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-grid gap-2">
                                    <button class="btn btn-success" type="button" id="confirmar" >Confirmar Productos</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- modal -->
        <div class="modal fade bg-red" id="exampleModal" tabindex="-1" data-bs-backdrop="static"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content modal-fullscreen w-100 ">
                <div class="modal-header text-center">
                    <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalLabel">Confirmar Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="sell_form">
                        <div class="btn-group-lg text-center" role="group" aria-label="Basic radio toggle button group" id="estado">
                            <input type="radio" class="btn-check " name="btnradio" id="btnradio1" autocomplete="off" value="PAGADA" checked>
                            <label class="btn btn-outline-success" for="btnradio1">Pagada</label>
                            <input type="radio" class="btn-check " name="btnradio" id="btnradio2" autocomplete="off" value="A CREDITO">
                            <label class="btn btn-outline-danger" for="btnradio2">A crédito</label>
                        </div>
                        <div class="form-group mt-5">
                            <h5>Fecha de la venta *</h5>
                            <input type="date" class="form-control form-control-lg" placeholder="Fecha de la Venta" id="fecha" name="fecha" value="<?php echo date("Y-m-d");?>">
                        </div>
                        <div class="form-group mt-5">
                            <h5>Hora de la venta *</h5>
                            <input type="time" class="form-control form-control-lg"  placeholder="Hora de la Venta" id="hora" name="hora" value="<?php ini_set('date.timezone','America/Caracas'); echo date("H:i");?>">
                        </div>
                        <h5 class="mt-5">Método de pago*</h5>
                        <div class="btn-group-md text-center" role="group" id="metodo">
                            
                            <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" value="1" checked>
                            <label class="btn btn-outline-dark" for="option1"><i class="ti-wallet "></i><br>Efectivo</label>

                            <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off"value="2">
                            <label class="btn btn-outline-dark" for="option2"><i class="ti-credit-card  "></i><br>Tarjeta</label>

                            <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off" value="3">
                            <label class="btn btn-outline-dark" for="option3"><i class="ti-desktop  "></i><br>Transferencia</label>

                            <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off"value="4">
                            <label class="btn btn-outline-dark" for="option4"><i class="ti-money  "></i><br>Dolares</label>
                        </div>
                        <div class="mt-5 form-group ">
                            <h5>Agregar un cliente <small>(opcional)</small></h5>
                            <select class="form-select  mb-3 shadow-none" aria-label=".form-select example" id="clien" name="clien">
                                <option value="" selected="selected">clientes</option>
                            
                            </select>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <div class="d-grid gap-2 d-md-block w-100">
                        <button class="btn btn-warning w-100" type="button" onclick="registrarVenta()">Confirmar Venta</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal ends -->

        
</div>

 <script src="<?= _THEME_?>js/scripts/ventas.js"></script>
