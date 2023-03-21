    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row py-0">
                <div class="col-lg-10 col-sm-8 col-9 grid-margin mb-0">
                    <h2 class="font-weight-bold text-dark pt-2 m-0"><a href="<?= _DIRECTORY_ ?>seguridad" style="text-decoration:none;"><b><i class="text-dark ti-angle-left"></i></b></a> Permisos</h2>
                </div>
            </div>
            
            <hr>
            <div class="row w-10 overflow-auto m-auto">
                <div class="card">
                    <div class="card-body">
                    <form method="POST" action="<?= _DIRECTORY_ ?>seguridad/guardarPermisos?c=<?=$_GET['c']?>">
                        <div class="row">
                            <div class="col">
                            <label class="btn btn-success"><input class="btn-check" type="checkbox" id="MarcarTodos" autocomplete="off" />Marcar/Desmarcar Todos</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 text-center">
                                <hr>
                                <h6><b>Gestionar Usuarios</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="21" <?= in_array("Consultar Usuarios", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="22" <?= in_array("Modificar Usuarios", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Modificar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="23" <?= in_array("Crear Usuarios", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Registrar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="24" <?= in_array("Eliminar Usuarios", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Eliminar</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 text-center">
                                <hr>
                                <h6><b class="">Gestionar Inventario</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="5" <?= in_array("Consultar Inventario", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Ventas</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="1" <?= in_array("Consultar Ventas", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="3" <?= in_array("Crear Ventas", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Registrar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="4" <?= in_array("Anular Ventas", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Anular</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Gastos</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="37" <?= in_array("Consultar Gastos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="38" <?= in_array("Registrar Gastos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Registrar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="39" <?= in_array("Eliminar Gastos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Eliminar</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Ingresos</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="40" <?= in_array("Consultar Ingresos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="41" <?= in_array("Crear Ingresos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Registrar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="42" <?= in_array("Anular Ingresos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Anular</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Productos</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="43" <?= in_array("Consultar Productos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="45" <?= in_array("Modificar Productos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Modificar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="44" <?= in_array("Crear Productos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Registrar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="46" <?= in_array("Eliminar Productos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Eliminar</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Categorias</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="47" <?= in_array("Consultar Categorias", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="48" <?= in_array("Modificar Categorias", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Modificar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="50" <?= in_array("Crear Categorias", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Registrar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="49" <?= in_array("Eliminar Categorias", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Eliminar</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Presentaciones</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="51" <?= in_array("Consultar Presentaciones", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="52" <?= in_array("Modificar Presentaciones", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Modificar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="53" <?= in_array("Crear Presentaciones", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Registrar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="54" <?= in_array("Eliminar Presentaciones", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Eliminar</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Marcas</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="55" <?= in_array("Consultar Marcas", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="56" <?= in_array("Modificar Marcas", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Modificar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="57" <?= in_array("Crear Marcas", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Registrar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="58" <?= in_array("Eliminar Marcas", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Eliminar</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Cuentas</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="9" <?= in_array("Consultar Deudas", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="10" <?= in_array("Abonar Deudas", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Abonar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="12" <?= in_array("Eliminar Deudas", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Eliminar</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Clientes</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="17" <?= in_array("Consultar Clientes", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="18" <?= in_array("Modificar Clientes", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Modificar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="19" <?= in_array("Crear Clientes", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Registrar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="20" <?= in_array("Eliminar Clientes", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Eliminar</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Proveedores</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="13" <?= in_array("Consultar Proveedores", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="14" <?= in_array("Modificar Proveedores", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Modificar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="15" <?= in_array("Crear Proveedores", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Registrar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="16" <?= in_array("Eliminar Proveedores", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Eliminar</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Estadísticas</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="25" <?= in_array("Estadisticas Ventas", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Estadísticas de ventas</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="59" <?= in_array("Estadisticas Gastos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Estadísticas de Gastos</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="60" <?= in_array("Estadisticas Vendidos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Estadísticas de Más vendidos</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Reportes de inventario</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="27" <?= in_array("Consultar Reportes Inventario", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Reportes de Balance</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="26" <?= in_array("Consultar Reportes Balance", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Reportes de Cuentas</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="28" <?= in_array("Consultar Reportes Deudas", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Reportes de Bitacora</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="36" <?= in_array("Consultar Reportes Bitacora", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Mantenimiento</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="29" <?= in_array("Crear Respaldo Base Datos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Respaldar BD</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="30" <?= in_array("Modificar Base Datos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Restaurar BD</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12 col-md-6 text-center">
                            <hr>
                                <h6><b>Gestionar Seguridad</b></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="31" <?= in_array("Consultar Roles", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Consultar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="32" <?= in_array("Modificar Roles", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                            
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Modificar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="33" <?= in_array("Crear Roles", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Registrar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="34" <?= in_array("Eliminar Roles", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Eliminar</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="permisos[]" value="35" <?= in_array("Crear Permisos", $data['permisos']) ? "checked='1'": '' ?>>
                                            <div class="slide round"></div>
                                        </label>
                                    </div>
                                    <div class="col text-start">
                                        <h6>Agregar permisos</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 text-center">
                            
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-block w-100 text-center mt-5">
                            <button type="submit" class="btn btn-warning w-50" type="button">Guardar Cambios</button>
                        </div>
                        <div class="d-grid gap-2 d-md-block w-100 text-center mt-2">
                            <button type="reset" class="btn btn-secondary w-50" type="button">Limpiar Cambios</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script >
$('document').ready(function () {
   $("#MarcarTodos").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
   });
});
</script>

