<?php
	namespace content\controllers;
	use content\libraries\core\autoload;
	use content\models\proveedoresModel;
	use content\controllers\bitacoraController;

class proveedoresController extends autoload {
  private $model;
  private $bitacora;

  public function __construct(){
        parent::__construct();
        $this->model = new proveedoresModel;
        $this->bitacora = new bitacoraController;
 
    }

    public function  listar(){
      $data = '<div class="list-group list-group-flush mt-2" id="proveedor">';

      $respuesta = $this->model->listar();
      if(in_array("Consultar Proveedores", $_SESSION['permisos'])){ 
        foreach ($respuesta as $regist) 
        {
          $data .= '<a ';
          if(in_array("Modificar Proveedores", $_SESSION['permisos'])){
             $data .= 'onclick="consultarproveedores('.$regist["id"].');"';
           }
           $data .=' type="button" class="list-group-item text-dark list-group-item-action py-3">
          <div class="row align-items-center">
            <div class="col-1 text-secondary"><i class="ti-user fa-2x"></i></div>
            <div class="col px-4">'.$regist['nombre'].' <small class="text-muted">'.$regist['contacto'].'</small></div>
            <div class="col text-end"><i class="ti-marker-alt "></i></div>
          </div> 
        </a>';
        };
      }

    $data .= '</div>';

    echo $data;

    }

    public function consultar($id){
      
      $resp = $this->model->consultar($id);

      $resultados [] = [
        "nombre"=>$resp->getnombre(),
        "tipo_doc"=>$resp->gettipoDoc(),
        "nro_doc"=>$resp->getnroDoc(),
        "contacto"=>$resp->getcontacto(),
        "direccion"=>$resp->getdireccion(),
        "id"=>$resp->getid(),
      ];
      echo json_encode($resultados);
      
    }

    public function guardar(){
      if (!empty($_POST['id'] && $_POST['nombre'] && $_POST['contacto'] )) {
        if (preg_match("|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|", $_POST['nombre'] )&&
                preg_match("|^[0-9,$]*$|", $_POST['contacto'])) {

          $p=new proveedoresModel();

          $p->setid($_POST['id']);
          $p->setnombre(strtoupper($_POST['nombre']));
          $p->setnroDoc(strtoupper($_POST['nro_doc']));
          $p->settipoDoc(strtoupper($_POST['tipo_doc']));
          $p->setdireccion(strtoupper($_POST['direccion']));
          $p->setcontacto(strtoupper($_POST['contacto']));

          $this->model->guardar($p);
          $fecha=date('Y-m-d');
                  $accion='Se modificó un proveedor '.$_POST['nombre'].' ';
                  $modulo='Proveedores';
                  $id=$_SESSION['id_usuario'];
                  $this->bitacora->insertar(
                      $fecha,
                      $accion,
                      $modulo,
                      $id);
        }
      }
    }

    public function registrar(){
      if (!empty( $_POST['nombre'] && $_POST['contacto'])) {
        if (preg_match("|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|", $_POST['nombre'] )&&
                preg_match("|^[0-9,$]*$|", $_POST['contacto'])) {
          $p=new proveedoresModel();

          $p->setnombre($_POST['nombre']);
          $p->setnroDoc($_POST['nro_doc']);
          $p->settipoDoc($_POST['tipo_doc']);
          $p->setdireccion($_POST['direccion']);
          $p->setcontacto($_POST['contacto']);

          $resp=$this->model->registrar($p);
          $fecha=date('Y-m-d');
                  $accion='Se registro un nuevo proveedor '.$_POST['nombre'].' ';
                  $modulo='Proveedores';
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

    public function eliminar(){
			$this->model->eliminar($_POST['id']);
      $fecha=date('Y-m-d');
                $accion='Se eliminó un proveedor con el id: '.$_POST['id'].' ';
                $modulo='Proveedores';
                $id=$_SESSION['id_usuario'];
                $this->bitacora->insertar(
                    $fecha,
                    $accion,
                    $modulo,
                    $id);
   	}

    public function buscar(){
      $data = '<div class="list-group list-group-flush mt-2" id="proveedor">';
      $respuesta = $this->model->buscar($_POST["busqueda"]);
      if ($respuesta->rowCount() > 0) {
        foreach ($respuesta as $regist) {
            $data .= '<a onclick="consultarproveedores('.$regist["id"].');" type="button" class="list-group-item text-dark list-group-item-action py-3">
                        <div class="row align-items-center">
                          <div class="col-1 text-secondary"><i class="ti-user fa-2x"></i></div>
                          <div class="col px-4">'.$regist['nombre'].' <small class="text-muted">'.$regist['contacto'].'</small></div>
                          <div class="col text-end"><i class="ti-marker-alt "></i></div>
                        </div> 
                      </a>';
        };
      }else {$data .= '<div class="row align-items-center">
                        <div class="col text-secondary text-center">No hay registros</div>
                      </div>';
      }
      $data .= '</div>';

      echo $data;
    }



}

?>