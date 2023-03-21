<?php
	namespace content\controllers;
	use content\libraries\core\autoload;
	use content\models\productosModel;
	use content\controllers\bitacoraController;

class productosController extends autoload {
    private $model;
    private $bitacora;

    public function __construct(){
        parent::__construct();
        $this->model = new productosModel;
        $this->bitacora = new bitacoraController;

    }

    function productos(){
      $data['page_tag'] = "Productos | Market MP";
      $data['page_title'] = "Productos";
      parent::getView("productos", $data);
    }

    public function  listar(){

      $data = '';

      $respuesta = $this->model->listar();

    	foreach ($respuesta as $regist) {
        if(in_array("Consultar Productos", $_SESSION['permisos'])){ 
          if ($respuesta->rowCount() > 6) {
                  $data .= '<div class="col p-1 "
                      ';
                  if(in_array("Modificar Productos", $_SESSION['permisos'])){ 
                        $data .= ' onclick="editarProducto('.$regist['id'].')">'; 
                  } $data.='<div class="card h-100"><img src="';
                          if($regist['url_img'] != NULL){
                              $data .= $regist['url_img'];
                          } else{
                              $data .= "assets/images/MP.png";
                          }  
                          $data .='" alt="...">
                        <div class="card-body text-center">
                            <h6 class="card-title text-success">'.$regist["nombre"].' '.$regist["marca"].'</h6>
                            <p class="card-text">'.$regist["volumen"].$regist["unidad_medida"].' * '.$regist["unidades"].' UND</p>
                        </div>
                    </div>
                  </div>';
            }elseif ($respuesta->rowCount() <= 6 && $respuesta->rowCount()>0) {
                $data .= '<div class="col p-1 "
                  ';
                if(in_array("Modificar Productos", $_SESSION['permisos'])){ 
                    $data .= ' onclick="editarProducto('.$regist['id'].')">'; 
                } $data.='<div class="card h-100"><img src="';
                        if($regist['url_img'] != NULL){
                            $data .= $regist['url_img'];
                        } else{
                            $data .= "assets/images/MP.png";
                        }  
                        $data .='" alt="...">
                    <div class="card-body text-center">'.$regist['id'].'
                        <h6 class="card-title text-success">'.$regist["nombre"].' '.$regist["marca"].'</h6>
                        <p class="card-text">'.$regist["volumen"].$regist["unidad_medida"].' * '.$regist["unidades"].' UND</p>                           
                    </div>
                </div>
                </div>';
            }else{
                $data.='No hay productos';
            }
        }
      }

      $data .= '';

      echo json_encode($data);
    }

    public function registrar(){
      
      if (!empty( $_POST['categoria'] && $_POST['marca'] && $_POST['presentacion'] && $_POST['nombre'])) {
        if (preg_match("|^[a-zA-Z0-9]+(\s*[a-zA-Z0-9]*)*[a-zA-Z0-9]+$|", $_POST['nombre'] )) {
          $p=new productosModel();

          $p->setnombre($_POST['nombre']);
          $p->setid_categoria($_POST['categoria']);
          $p->setdescripcion($_POST['descripcion']);
          $p->setid_marca($_POST['marca']);
          $p->setid_presentacion($_POST['presentacion']);
          
          if(isset($_FILES['file'])){
            if (($_FILES["file"]["type"] == "image/pjpeg")
              || ($_FILES["file"]["type"] == "image/jpeg")
              || ($_FILES["file"]["type"] == "image/png")
              || ($_FILES["file"]["type"] == "image/gif")) {
              if (move_uploaded_file($_FILES["file"]["tmp_name"], "assets/images/productos/".$_FILES['file']['name'])) {
                $p->seturl_img("assets/images/productos/".$_FILES['file']['name']);
              } else {
                die("<script>document.location.href='error';</script>");
              }
            } else {
              die("<script>document.location.href='error';</script>");
            }
          }
          $resp=$this->model->registrar($p);
          $fecha=date('Y-m-d');
                  $accion='Se registro un nuevo producto '.$_POST['nombre'].' ';
                  $modulo='Productos';
                  $id=$_SESSION['id_usuario'];
                  $this->bitacora->insertar(
                      $fecha,
                      $accion,
                      $modulo,
                      $id);
          echo json_encode($resp);
        }
			}
    }

    public function  listarCat(){

      $respuesta = $this->model->listarCat();

      foreach ($respuesta as $r){
        echo'  
        <option value="'.$r->id.'">'.$r->categoria.'</option>';
      };

    }

    public function  listarMarca(){

      $respuesta = $this->model->listarMarca();

      foreach ($respuesta as $r){
        echo'  
        <option value="'.$r->id.'">'.$r->nombre.'</option>';
      };

    }

    public function  listarPresentacion(){

      $respuesta = $this->model->listarPresentacion();

      foreach ($respuesta as $r){
        echo'  
        <option value="'.$r->id.'">'.$r->volumen.$r->unidad_medida.' * '.$r->unidades.'</option>';
      };

    }

    public function consultar($id){
      
      $resp = $this->model->consultar($id);

      $resultados [] = [
        "url_img"=>$resp->geturl_img(),
        "nombre"=>$resp->getnombre(),
        "categoria"=>$resp->getid_categoria(),
        "marca"=>$resp->getid_marca(),
        "presentacion"=>$resp->getid_presentacion(),
        "descripcion"=>$resp->getdescripcion(),
        "id"=>$id
      ];
      echo json_encode($resultados);
      
    }

    public function guardar(){
      if (!empty( $_POST['categoria'] && $_POST['marca'] && $_POST['presentacion']
       && $_POST['id'] && $_POST['nombre'])) {
        if (preg_match("|^[a-zA-Z0-9]+(\s*[a-zA-Z0-9]*)*[a-zA-Z0-9]+$|", $_POST['nombre'] )) {
          $p=new productosModel();

          $p->setnombre($_POST['nombre']);
          $p->setid_categoria($_POST['categoria']);
          $p->setid_marca($_POST['marca']);
          $p->setid_presentacion($_POST['presentacion']);
          $p->setdescripcion($_POST['descripcion']);
          $p->setid($_POST['id']);
          if(isset($_FILES['file'])){
            if (($_FILES["file"]["type"] == "image/pjpeg")
              || ($_FILES["file"]["type"] == "image/jpeg")
              || ($_FILES["file"]["type"] == "image/png")
              || ($_FILES["file"]["type"] == "image/gif")) {
              if (move_uploaded_file($_FILES["file"]["tmp_name"], "assets/images/productos/".$_FILES['file']['name'])) {
                $p->seturl_img("assets/images/productos/".$_FILES['file']['name']);
              } else {
                die("<script>document.location.href='error';</script>");
              }
            } else {
              die("<script>document.location.href='error';</script>");
            }
          }
          $this->model->guardar($p);
          $fecha=date('Y-m-d');
                  $accion='Se modificó un producto '.$_POST['nombre'].' ';
                  $modulo='Productos';
                  $id=$_SESSION['id_usuario'];
                  $this->bitacora->insertar(
                      $fecha,
                      $accion,
                      $modulo,
                      $id);
        }
			}
    }

    public function  totalProd(){
      $respuesta = $this->model->totalProd();
      if ($respuesta["prod"] == NULL) {
        echo 0;
      }else {
        echo $respuesta["prod"];
      }
  }

    public function eliminar(){
			$this->model->eliminar($_POST['id']);
      $fecha=date('Y-m-d');
                $accion='Se eliminó un producto con el id: '.$_POST['id'].' ';
                $modulo='Productos';
                $id=$_SESSION['id_usuario'];
                $this->bitacora->insertar(
                    $fecha,
                    $accion,
                    $modulo,
                    $id);
   	}

     public function buscarProd(){
      
      $data = '';
      $respuesta = $this->model->buscar($_POST["busqueda"]);
      if ($respuesta->rowCount() > 0) {
        if(in_array("Consultar Productos", $_SESSION['permisos'])){ 
          foreach ($respuesta as $regist) {
            
            $data .= '<div class="col p-1 "
                      ';
                  if(in_array("Modificar Productos", $_SESSION['permisos'])){ 
                        $data .= ' onclick="editarProducto('.$regist['id'].')">'; 
                  } $data.='<div class="card h-100"><img src="';
                          if($regist['url_img'] != NULL){
                              $data .= $regist['url_img'];
                          } else{
                              $data .= "assets/images/MP.png";
                          }  
                          $data .='" alt="...">
                        <div class="card-body text-center">
                            <h6 class="card-title text-success">'.$regist["nombre"].' '.$regist["marca"].'</h6>
                            <p class="card-text">'.$regist["volumen"].$regist["unidad_medida"].' * '.$regist["unidades"].' UND</p>
                        </div>
                    </div>
                  </div>';
          }
        }
      }else {$data .= '<div class="row text-center">
                        <div class="col text-secondary text-center">No hay registros</div>
                      </div>';
      }
      $data .= '';
      
      echo $data;
    }
}

?>