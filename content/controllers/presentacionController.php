<?php
	namespace content\controllers;
	use content\libraries\core\autoload;
	use content\models\presentacionModel;
	use content\controllers\bitacoraController;

class presentacionController extends autoload {
  private $model;
  private $bitacora;

  public function __construct(){
        parent::__construct();
        $this->model = new presentacionModel;
        $this->bitacora = new bitacoraController;

    }

    public function  listar(){
      $data = '';

      $respuesta = $this->model->listar();

    	foreach ($respuesta as $regist) 
    	{
        if(in_array("Consultar Presentaciones", $_SESSION['permisos'])){ 
            $data .= '<a type="button"';
            if(in_array("Modificar Presentaciones", $_SESSION['permisos'])){ 
              $data.=' onclick="editarPresentacion('.$regist['id'].');"';
             }
             $data.=' class="list-group-item text-dark list-group-item-action p-3">
            <div class="row">
              <div class="col">'.$regist['volumen'].$regist['unidad_medida'].' * '.$regist['unidades'].' Und</div>
              <div class="col text-end"><i class="ti-angle-right"></i></div>
            </div> 
          </a>';
        };
      }
    $data .= '';

    echo $data;

    }

    public function consultar($id){
      
      $resp = $this->model->consultar($id);

      $resultados [] = [
        "unidades"=>$resp->getunidades(),
        "medidas"=>$resp->getmedidas(),
        "volumen"=>$resp->getvolumen(),
        "id"=>$resp->getid(),
      ];
      echo json_encode($resultados);
      
    }

    public function guardar(){
      if (!empty($_POST['id'] && $_POST['volumen']&& $_POST['medidas']&& $_POST['unidades'] )) {
        if (preg_match("|^[0-9,$]*$|", $_POST['volumen'])&&
                preg_match("|^[0-9,$]*$|", $_POST['unidades'])) {
          $p=new presentacionModel();

          $p->setid($_POST['id']);
          $p->setvolumen($_POST['volumen']);
          $p->setmedidas($_POST['medidas']);
          $p->setunidades($_POST['unidades']);

          $this->model->guardar($p);
          $fecha=date('Y-m-d');
                  $accion='Se modificó una presentación ';
                  $modulo='Presentaciones';
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
        if (!empty( $_POST['volumen']&& $_POST['medidas']&& $_POST['unidades'])) {
          if (preg_match("|^[0-9,$]*$|", $_POST['volumen'])&&
                preg_match("|^[0-9,$]*$|", $_POST['unidades'])) {
            $p=new presentacionModel();
            $p->setvolumen($_POST['volumen']);
            $p->setmedidas($_POST['medidas']);
            $p->setunidades($_POST['unidades']);
            $resp=$this->model->registrar($p);
            $fecha=date('Y-m-d');
                $accion='Se registro una nueva presentación ';
                $modulo='Presentaciones';
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

     public function eliminarPresentacion($id){
			$this->model->eliminarPresentacion($id);
      $fecha=date('Y-m-d');
                $accion='Se eliminó una presentación con el id '.$id.' ';
                $modulo='Presentaciones';
                $id=$_SESSION['id_usuario'];
                $this->bitacora->insertar(
                    $fecha,
                    $accion,
                    $modulo,
                    $id);
   	}

    

}

?>