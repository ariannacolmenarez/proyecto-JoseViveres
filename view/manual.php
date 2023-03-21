<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manual</title>
    <!-- plugins:css -->
    <?php
    $directory="http://localhost/jose%20viveres/";
    
    ?>
  <link rel="stylesheet" href="<?php echo $directory?>assets/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo $directory?>assets/fonts/css/all.css">
  <link rel="stylesheet" href="<?php echo $directory?>assets/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo $directory?>assets/sweetalert2/sweetalert2.min.css">

  <!-- <link href="css/notificaciones.css" rel="stylesheet"> -->
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href= "<?php echo $directory?>assets/css/style.css">
  <link rel="stylesheet" href= "<?php echo $directory?>assets/css/jquery-ui.css">
  <link rel="stylesheet" href= "<?php echo $directory?>assets/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $directory?>assets/DataTables/datatables.min.css"/>
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo $directory?>assets/images/MP.png" />
  <script src="<?php echo $directory?>assets/js/jquery-3.6.1.min.js"></script>
  
  <script src="<?php echo $directory?>assets/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="<?php echo $directory?>assets/js/scripts/notificaciones.js"></script>
</head>
<body class="m-0 vh-100 row justify-content-center align-items-center">

<nav class="navbar bg-body-tertiary fixed-top" style="background-color: #ffff;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" onclick="funcionr('completo')">Manual de usuario dinamico</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
    <span class="ti-view-list"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Manual interactivo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('completo')">Documento completo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#login')">inicio de sesion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#mensajes')">Mensajes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#perfil')">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#menu')">Menu lateral</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#balance')">Balance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#usuarios')">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#inventario')">Inventario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#ingresos')">Ingresos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#productos')">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#cuentas')">Cuentas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#clientes')">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#proveedores')">proveedores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#estadisticas')">Estadisticas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#reportes')">Reportes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#mantenimiento')">Mantenimiento</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="funcionr('#seguridad')">Seguridad</a>
          </li>
        
          
        </ul>
       
      </div>
    </div>
  </div>
</nav>
<div id="dina">

</div>
<div id="contenido">
<div id="login">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/login/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Inicio de sesión: </h5>
    <p class="card-text">En esta sección del sistema el usuario ingresa sus credenciales para acceder al sistema</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Rojo: Se ingresa el nombre de usuario asociado al sistema para ingresar </li>
    <li class="list-group-item">Azul: Se ingresa la contraseña asociada al sistema para ingresar </li>

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/login/2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Recuperar contraseña: </h5>
    <p class="card-text">En esta sección del sistema el usuario ingresa el correo asociado al sistema para recibir al mismo la nueva contraseña asignada por el sistema</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Azul: En este campo el usuario ingresara su correo asignado al sistema para recibir su nueva contraseña</li>
   

  </ul>
  
</div>
</div>
</div>




<div id="mensajes">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/mensajes/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Mensajes: </h5>
    <p class="card-text">Con este botón se despliega un modal en donde se mostrarán las conversaciones de los usuarios, así como también los usuarios podrán comunicarse entre ellos</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Azul: Botón para desplegar el modal del chat</li>
    <li class="list-group-item">•	Rojo: modal donde se muestran las conversaciones </li>
    <li class="list-group-item">•	Amarillo: aquí es donde los usuarios escriben los mensajes a enviar </li>
    <li class="list-group-item">•	Verde: botón para enviar los mensajes ya escritos </li>
    

  </ul>
  
</div>
</div>



</div>



<div id="perfil">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/perfil/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Perfil: </h5>
    <p class="card-text">Botón de perfil para mostrar submenú con enlaces a diferentes módulos de gran importancia dentro del sistema</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Rojo: Submenu con enlaces del perfil y cerrar sesión  </li>
 
    

  </ul>
  
</div>
</div>



</div>



<div id="menu">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/menu/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Menú lateral: </h5>
    <p class="card-text">Menú para mostrar todos los enlaces que dirigen a los diferentes módulos del sistema</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Rojo: Es un menú lateral expandible con un acceso rápido hacia los diferentes módulos del sistema</li>
 
    

  </ul>
  
</div>
</div>



</div>


<div id="balance">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/balance/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Módulo de Balance: </h5>
    <p class="card-text">Aquí se podrá observar el estado financiero del sistema </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Amarillo: aquí están los botones de registrar venta, el cual envía al usuario a el submódulo de ventas, y luego tenemos el botón de registrar gastos el cual despliega un modal con un formulario </li>
    <li class="list-group-item">•	Azul: Aquí es donde se muestran ya sea por fecha o diaria, semanal, mensual o anualmente el balance del sistema </li>
    <li class="list-group-item">	•	Negro: este botón envía al usuario al modulo de reportes de balance </li>
    <li class="list-group-item">•	Rojo: aquí se muestran la utilidad, ventas totales y gastos totales registrados en el sistema </li>
    <li class="list-group-item">•	Verde: Aquí se muestran los ingresos y egresos, los cuales se muestran dependiendo de la organización seleccionada por el usuario.</li>
    <li class="list-group-item">•	Naranja: con este botón se eliminarán tanto las ventas como los gastos </li>
    <li class="list-group-item">•	Morado: Este botón genera una factura con los datos de la venta o gasto registrado </li>
    
 
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/balance/2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Ventas: </h5>
    <p class="card-text"> Aquí es donde se registran las ventas del sistema </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Morado: Se organizan los productos dependiendo de las categorías </li>
    <li class="list-group-item">•	Azul: Campo para buscar los productos por el nombre </li>
    <li class="list-group-item">	•	Rojo: Se muestran los productos registrados </li>
    <li class="list-group-item">•	Negro: botón para agregar el producto a la canasta </li>
    <li class="list-group-item">•	Verde: canasta donde se muestran los productos a vender </li>
    <li class="list-group-item">•	Naranja: botón para vaciar la canasta de productos </li>
    <li class="list-group-item">•	Amarillo: botón para confirmar los productos a vender </li>
    
 
    

  </ul>
  
</div>
</div>

<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/balance/3.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Formulario de ventas: </h5>
    <p class="card-text"> Sección donde se completan los datos necesarios para la venta  </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Naranja: se selecciona si la venta va a ser pagada o a crédito</li>
    <li class="list-group-item">•	Verde: formulario necesario para la venta </li>
    <li class="list-group-item">•	Azul: botón de confirmación</li>
    
 
    

  </ul>
  
</div>
</div>

<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/balance/4.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gastos: </h5>
    <p class="card-text">Es donde se registrarán los gastos que haga la comunidad</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Naranja: Se selecciona si el gasto se hizo a crédito o fue cancelado </li>
    <li class="list-group-item">•	Azul: formulario a llenar con los datos del gasto </li>
    <li class="list-group-item">•	Rojo: botón de registrar gasto</li>
    
 
    

  </ul>
  
</div>
</div>


</div>


<div id="usuarios">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/usuario/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">	Gestionar usuarios: </h5>
    <p class="card-text">Aquí se ven los usuarios registrados, se modifican, eliminaran y se agregan usuarios al sistema.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Rojo: Cuadro para buscar entre los usuarios registrados  </li>
    <li class="list-group-item">•	Naranja: se muestran los usuarios registrados </li>
    <li class="list-group-item">•	Azul: botón para agregar usuario  </li>
 
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/usuario/2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Modificar y Eliminar usuario:</h5>
    <p class="card-text">Seccion en dode se modifican y eliminan los usuarios registrados</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Naranja: Formulario en donde se ingresarán los nuevos datos del usuario seleccionado</li>
    <li class="list-group-item">•	Azul: Botón para guardar los cambios realizados </li>
    <li class="list-group-item">•	Morado: Botón para eliminar al usuario seleccionado </li>
 
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/usuario/3.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Agregar usuario:</h5>
    <p class="card-text">Seccion en dode se agregaran los usuarios al sistema</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Morado: formulario con los datos para registrar al nuevo usuario </li>
    <li class="list-group-item">•	Azul: botón para guardar y registrar al nuevo usuario </li>

 
    

  </ul>
  
</div>
</div>





</div>






<div id="inventario">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/inventario/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar inventario: </h5>
    <p class="card-text">se agregan consultan y eliminan productos con stock, así como también se pueden ordenar por categoría.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Amarillo: botón que lleva a el módulo de ingreso de productos</li>
    <li class="list-group-item">•	Naranja: cuadro para buscar por nombre los productos registrados </li>
    <li class="list-group-item">•	Morado: cuadro para ordenar los productos por categoría </li>
    <li class="list-group-item">•	Azul: se muestran todos los productos registrados </li>
 
    

  </ul>
  
</div>
</div>




</div>



<div id="ingresos">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/ingresos/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar ingresos:  </h5>
    <p class="card-text">Sección donde se factura la compra de nuevo productos </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Naranja: botón para registrar la compra de un producto </li>
    <li class="list-group-item">•	Amarillo: tabla donde se muestran los productos y sus opciones</li>
    <li class="list-group-item">•	Azul: Las compras registradas </li>
    <li class="list-group-item">•	Rojo: Se despliega un modal con los datos de la compra</li>
 
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/ingresos/2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Registrar ingreso:</h5>
    <p class="card-text">Sección donde se llenan los datos para la factura </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Naranja: formulario donde se ingresan los datos de el ingreso  </li>
    <li class="list-group-item">•	Amarillo: botón para agregar productos a comprar </li>
    <li class="list-group-item">•	Verde: Botón para registrar el ingreso </li>

 
    

  </ul>
  
</div>
</div>



<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/productos/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">	Productos:</h5>
    <p class="card-text">Sección donde se seleccionan los productos a comprar </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Verde: Se selecciona el producto a comprar  </li>
    <li class="list-group-item">•	Rojo: formulario en donde se llenan los datos del ingreso con respecto al producto </li>
    <li class="list-group-item">•	Azul: botón de Agregar producto al ingreso y botón de cancelar  </li>

 
    

  </ul>
  
</div>
</div>




</div>








<div id="productos">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/productos/2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar productos:  </h5>
    <p class="card-text">En este modulo Se registran, modifican, eliminan y consultan productos, así como también las categorías, presentaciones y marcas</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Morado: botón para registrar un nuevo producto en el sistema </li>
    <li class="list-group-item">•	Azul: botón que despliega una modal para gestionar las categorías </li>
    <li class="list-group-item">•	Naranja: botón que despliega una modal para gestionar las presentaciones </li>
    <li class="list-group-item">•	Amarillo: botón que despliega una modal para gestionar las marcas </li>
    <li class="list-group-item">•	Negro: cuadro para buscar los productos registrados por nombres  </li>
    <li class="list-group-item">•	Rojo: cuadro donde se muestran en números el total de productos registrados </li>
    <li class="list-group-item">•	Verde: sección donde se muestra la presentación de los productos registrados </li>
 
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/productos/3.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Registrar productos:</h5>
    <p class="card-text">Sección donde se registran los nuevos productos </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Verde: Sección donde se selecciona una imagen representativa del producto </li>
    <li class="list-group-item">•	Azul: formulario a llenar en donde se ingresan los datos del producto </li>
    <li class="list-group-item">•	Rojo: botón de registrar producto </li>

 
    

  </ul>
  
</div>
</div>



<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/productos/4.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">	Categorías</h5>
    <p class="card-text">Sección donde se registran, modifican,eliminan y consultan las categorias</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Rojo: cuadro para buscar las categorías registradas </li>
    <li class="list-group-item">•	Azul: sección en donde se muestran las categorías registradas </li>
    <li class="list-group-item">•	Amarillo: botón para modificar o eliminar la categoría seleccionada </li>
    <li class="list-group-item">•	Morado: botón para registrar categoría  </li>
 
    

  </ul>
  
</div>
</div>

<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/productos/5.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Registrar categorías:</h5>
    <p class="card-text">Sección donde se registran las categorias</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Azul: formulario en donde se ingresan los datos de la categoría a registrar </li>
    <li class="list-group-item">•	Rojo: Botón de agregar categoría </li>
  
    

  </ul>
  
</div>
</div>

<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/productos/6.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Modificar y eliminar categoría :</h5>
    <p class="card-text">Sección donde se modifican,eliminan las categorias</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Rojo: formulario para modificar la categoría seleccionada </li>
    <li class="list-group-item">•	Azul: botón para eliminar registro </li>
    <li class="list-group-item">•	Amarillo: botón para guardar los cambios de la categoría seleccionada </li>
    <li class="list-group-item">•	Morado: botón para eliminar la categoría seleccionada </li>
  
    

  </ul>
  
</div>
</div>

<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/productos/7.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar presentaciones </h5>
    <p class="card-text">Sección donde se registran, modifican,eliminan y consultan las presentaciones</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Morado: lista de presentaciones registradas </li>
    <li class="list-group-item">•	Azul: botón para modificar y eliminar la presentación seleccionada  </li>
    <li class="list-group-item">•	Rojo: botón para agregar una nueva presentación  </li>
    
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/productos/8.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Modificar y eliminar presentación </h5>
    <p class="card-text">Sección donde se registran, modifican,eliminan y consultan las presentaciones</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Rojo: campos para modificar los datos de la presentación </li>
    <li class="list-group-item">•	Morado: botón para guardar los cambios </li>
    <li class="list-group-item">•	Azul: botón para eliminar la presentación seleccionada </li>
    
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/productos/9.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Registrar presentación  </h5>
    <p class="card-text">Sección donde se registran, modifican,eliminan y consultan las presentaciones</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Azul: campos a llenar para registrar la nueva presentación </li>
    <li class="list-group-item">•	Morado: botón de agregar la nueva presentación  </li>
   
    
    

  </ul>
  
</div>
</div>

<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/productos/10.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar marcas</h5>
    <p class="card-text">Sección donde se registran, modifican,eliminan y consultan las marcas</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Morado: cuadro de búsqueda de marcas </li>
    <li class="list-group-item">•	Rojo: marcas registradas </li>
    <li class="list-group-item">•	Azul: botones para modificar y eliminar marca</li>
    <li class="list-group-item">•	Verde: botón para registrar una nueva marca </li>
   
    
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/productos/11.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Modificar y eliminar marca</h5>
    <p class="card-text">Sección donde se registran, modifican,eliminan y consultan las marcas</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Verde: formulario donde se ingresan los datos a modificar de la marca </li>
    <li class="list-group-item">•	Morado: Botón de guardar los cambios realizados </li>
    <li class="list-group-item">•	Azul: Botón para eliminar la marca seleccionada </li>
   
   
    
    

  </ul>
  
</div>
</div>

<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/productos/12.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Agregar marca</h5>
    <p class="card-text">Sección donde se registran, modifican,eliminan y consultan las marcas</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Azul: formulario en donde se ingresan los datos de la marca a registrar </li>
    <li class="list-group-item">•	Morado: Botón para registrar la nueva marca </li>
   
   
   
    
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/productos/13.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Modificar productos </h5>
    <p class="card-text">Sección donde se modificaran los productos registrados</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Morado: formulario en donde se ingresan los datos del producto a modificar </li>
    <li class="list-group-item">•	Rojo: botón para guardar los cambios realizados  </li>
    <li class="list-group-item">•	Azul: botón para eliminar el producto seleccionado </li>
   
   
   
   
    
    

  </ul>
  
</div>
</div>






</div>





<div id="cuentas">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/cuentas/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar cuentas:  </h5>
    <p class="card-text">Sección donde se gestionan las cuentas por cobrar y cuentas por pagar </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Azul: botón para generar un listado con las cuentas por pagar </li>
    <li class="list-group-item">•	Morado: botón para generar un listado con las cuentas por cobrar </li>
    <li class="list-group-item">•	Naranja: listado generado  </li>

 
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/cuentas/2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Cuentas por pagar:</h5>
    <p class="card-text">Sección donde se gestionan las cuentas por pagar</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Naranja: se selecciona para ver las cuentas o los abonos</li>
    <li class="list-group-item">•	Morado: se muestran el total de cuentas y el total a pagar </li>
    <li class="list-group-item">•	Azul: se muestra una lista de las cuentas a pagar </li>
    <li class="list-group-item">•	Rojo: botones para abonar en las cuentas por pagar </li>
    

 
    

  </ul>
  
</div>
</div>



<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/cuentas/3.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Abonar:</h5>
    <p class="card-text">Sección donde se abonan en las cuentas por pagar </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Rojo: formulario en donde se ingresan los datos para el abono</li>
    <li class="list-group-item">•	Azul: Botón para registrar abono</li>
  

 
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/cuentas/4.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Abonos:</h5>
    <p class="card-text">Sección donde se consultan y eliminan los abonos registrados</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Azul: lista de abonos </li>
    <li class="list-group-item">•	Verde: botón para eliminar el abono seleccionado </li>
  

 
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/cuentas/5.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Cuentas por cobrar :</h5>
    <p class="card-text">Sección donde se gestionan las cuentas por cobrar</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Verde: se selecciona si listar las cuentas por cobrar o los abonos </li>
    <li class="list-group-item">•	Morado: se muestra el total de cuentas por cobrar </li>
    <li class="list-group-item">•	Azul: Listados de cuentas por cobrar </li>
  

 
    

  </ul>
  
</div>
</div>




</div>









<div id="clientes">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/clientes/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar clientes:  </h5>
    <p class="card-text">Sección en donde se pueden modificar, registrar, eliminar y consultar clientes </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Azul: cuadro para buscar entre los clientes registrados </li>
    <li class="list-group-item">•	Verde: lista de clientes registrados </li>
    <li class="list-group-item">•	Rojo: botón para modificar los datos del cliente seleccionado </li>

 
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/clientes/2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Modificar y eliminar cliente:</h5>
    <p class="card-text">Sección en donde se pueden modificar, registrar, eliminar y consultar clientes </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Marrón: formulario en donde se colocarán los datos a modificar del cliente </li>
    <li class="list-group-item">•	Azul: botón para guardar los datos modificados del cliente </li>
    <li class="list-group-item">•	Morado: botón para eliminar el cliente seleccionado   </li>
 
    

 
    

  </ul>
  
</div>
</div>



<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/clientes/3.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Registrar cliente:</h5>
    <p class="card-text">Sección donde se registraran los nuevos clentes </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Rojo: formulario a llenar con los datos del cliente a registrar </li>
    <li class="list-group-item">•	Morado: botón para registrar cliente</li>
  

 
    

  </ul>
  
</div>
</div>






</div>





<div id="proveedores">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/proveedores/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar proveedores:  </h5>
    <p class="card-text">Sección en donde se pueden modificar, registrar, eliminar y consultar proveedores </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Morado: cuadro para buscar entre los proveedores registrados  </li>
    <li class="list-group-item">•	Verde: lista de proveedores registrados </li>
    <li class="list-group-item">•	Azul: botón para modificar los datos del proveedor </li>
    <li class="list-group-item">•	Rojo: Botón para registrar un proveedor nuevo </li>

 
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/proveedores/2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Modificar y eliminar proveedores:</h5>
    <p class="card-text">Sección en donde se pueden modificar, registrar, eliminar y consultar provedores </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Morado: formulario en donde se colocan los datos a modificar del proveedor </li>
    <li class="list-group-item">•	Rojo: botón para guardar los cambios realizados </li>
    <li class="list-group-item">•	Azul: eliminar el proveedor seleccionado  </li>
 
    

 
    

  </ul>
  
</div>
</div>



<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/proveedores/3.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Registrar proveedores:</h5>
    <p class="card-text">Sección donde se registraran los nuevos proveedores </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Azul: formulario en donde se colocan los datos del proveedor a registrar </li>
    <li class="list-group-item">•	Morado: botón de guardar los datos del nuevo proveedor </li>
  

 
    

  </ul>
  
</div>
</div>






</div>



<div id="estadisticas">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/estadisticas/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar proveedores:  </h5>
    <p class="card-text">Sección en donde se generaran las estadisticas del sistema </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Morado: sección en donde se define los tiempos en los que se generan las gráficas, ya sea semanal, mensual o anual </li>
    <li class="list-group-item">•	Azul: Sección en donde se selecciona el contenido de las gráficas, ya sea de ventas, gastos o los mas vendidos </li>
    <li class="list-group-item">•	Verde: Sección en donde se selecciona las fechas para las graficas </li>
    <li class="list-group-item">•	Rojo: Sección en donde se muestran las graficas </li>

 
    

  </ul>
  
</div>
</div>








</div>


<div id="reportes">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/reportes/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Reportes de inventario: </h5>
    <p class="card-text">Sección en donde se generaran los reportes del inventario</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Rojo: Botón para generar reportes del stock de productos </li>
    <li class="list-group-item">•	Azul: Tabla en donde se muestran los productos en stock </li>
   
 
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/reportes/2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Reportes de balance: </h5>
    <p class="card-text">Sección en donde se generaran los reportes del balance</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Azul: Sección en donde se selecciona el periodo del reporte </li>
    <li class="list-group-item">•	Rojo: Sección en donde se selecciona la fecha de reporte  </li>
    <li class="list-group-item">•	Morado: Sección en donde se muestra los archivos y los totales </li>
    <li class="list-group-item">•	Verde: botón para imprimir el reporte seleccionado </li>
   
 
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/reportes/3.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Reportes de deudas: </h5>
    <p class="card-text">Sección en donde se generaran los reportes del deudas</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Verde: Sección en donde se selecciona el periodo del reporte </li>
    <li class="list-group-item">•	Rojo: Sección en donde se selecciona la fecha de reporte  </li>
    <li class="list-group-item">•	Azul: Sección en donde se muestra las deudas y los totales  </li>
    <li class="list-group-item">•	naranja: botón para imprimir el reporte seleccionado </li>
   
 
    

  </ul>
  
</div>
</div>

<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/reportes/4.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Reportes de bitacora: </h5>
    <p class="card-text">Sección en donde se generaran los reportes del bitacora</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Naranja: tablas en donde se muestra las acciones de los usuarios que fueron realizadas en el sistema.</li>
    <li class="list-group-item">•	Azul: cuadro de búsqueda para aplicar sobre los registros de la bitácora </li>

   
 
    

  </ul>
  
</div>
</div>







</div>






<div id="mantenimiento">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/mantenimiento/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar mantenimiento:  </h5>
    <p class="card-text">Sección en donde se hacen operaciones con la base de datos </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Azul: Sección en donde se muestran las acciones disponibles para realizar en la base de datos </li>
    <li class="list-group-item">•	Verde: botón para respaldar la base de datos el cual crea un archivo que contiene la base de datos actual </li>
    <li class="list-group-item">•	Morado: botón para restaurar la base de datos el cual carga un archivo previamente creado de la base de datos y lo carga al sistema </li>


 
    

  </ul>
  
</div>
</div>








</div>





<div id="seguridad">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/seguridad/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar seguridad:  </h5>
    <p class="card-text">Sección en donde se hacen operaciones con los roles y permisos del sistema </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Naranja: botón para registrar un nuevo rol</li>
    <li class="list-group-item">•	Morado: tabla con los roles que ya están registrados en el sistema  </li>
    <li class="list-group-item">•	Verde: Cuadro de búsqueda para aplicar a los roles ya registrados  </li>
    <li class="list-group-item">•	Azul: opciones para eliminar rol, modificar permisos a rol o modificar rol</li>


 
    

  </ul>
  
</div>
</div>

<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/seguridad/2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Registrar rol:  </h5>
    <p class="card-text">Sección en donde se registraran los nuevos roles al sistema</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Verde: Formulario en donde se ingresan los datos del nuevo rol a registrar </li>
    <li class="list-group-item">•	Azul: Botón para guardar el nuevo rol </li>
   


 
    

  </ul>
  
</div>
</div>


<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/seguridad/3.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Modificar  rol:  </h5>
    <p class="card-text">Sección en donde se modificarn los roles del sistema</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Azul: formulario en donde se ingresan los datos a modificar del rol seleccionado </li>
    <li class="list-group-item">•	Morado: botón para guardar los cambios del rol seleccionado </li>
   


 
    

  </ul>
  
</div>
</div>

<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="<?php echo $directory?>docs/img/seguridad/4.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Modificar  permisos:  </h5>
    <p class="card-text">Sección en donde se permisos de cada rol registrado en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">•	Morado: botón para marcar o desmarcar todos los permisos sobre el rol seleccionado </li>
    <li class="list-group-item">•	Azul: tabla en la que se muestran todos los permisos por módulos del sistema  </li>
    <li class="list-group-item">•	Rojo: botón para guardar los cambios de los permisos del rol seleccionado   </li>
    <li class="list-group-item">•	Verde: botón para revertir los cambios realizados   </li>
   


 
    

  </ul>
  
</div>
</div>








</div>



</div>




  <!-- plugins:js -->
  <script src="<?php echo $directory?>assets/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?php echo $directory?>assets/chart.js/Chart.min.js"></script>
  <script src="<?php echo $directory?>assets/js/jquery.cookie.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo $directory?>assets/js/chart.js"></script>
  <script src="<?php echo $directory?>assets/js/off-canvas.js"></script>
  <script src="<?php echo $directory?>assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo $directory?>assets/js/template.js"></script>
  <script src="<?php echo $directory?>assets/js/todolist.js"></script>
  <script type="text/javascript" src="<?php echo $directory?>assets/DataTables/datatables.min.js"></script>

  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo $directory?>assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script src="<?php echo $directory?>assets/js/jquery-ui.min.js"></script>
  <script src="<?php echo $directory?>assets/js/jquery.validate.js"></script>
  <script src="<?php echo $directory?>assets/js/messages_es.js"></script>
  <script src="<?php echo $directory?>assets/js/additional-methods.js"></script>
  <script src="<?php echo $directory?>assets/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo $directory?>assets/js/week.js"></script>
  <script src="<?php echo $directory?>assets/js/month.js"></script>
  <script src="<?php echo $directory?>assets/js/year.js"></script>  
  <script src="<?php echo $directory?>assets/js/scripts/alerts/logout.js"></script>
  <script src="<?php echo $directory?>assets/js/scripts/manual.js"></script>
</body>
</html>