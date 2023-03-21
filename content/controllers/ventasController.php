<?php
namespace content\controllers;
use content\libraries\core\autoload;
use content\models\ventasModel;
use content\controllers\bitacoraController;

class ventasController extends autoload {
  private $model;
  private $bitacora;

    public function __construct(){
        parent::__construct();
        $this->model = new ventasModel;
        $this->bitacora = new bitacoraController;

    }

    public function ventas(){
        $data['page_tag'] = "Ventas | Market MP";
        $data['page_title'] = "Ventas";
        parent::getView("ventas", $data);
        
    }

    public function  listar(){

      $data = '<div class="row row-cols-1 row-cols-lg-5 row-cols-sm-4 g-3 m-0">';

      $respuesta = $this->model->listar($_POST['opcion']);
      $prod=0;
    	foreach ($respuesta as $regist) {
        
    		$data .= '<div class="col p-1 ">
                          <div class="card h-100">';
              if ($regist['cantidad']>0) {
                
                $data.= '<a onclick="agg('.$regist["id"].',1);" style="position: absolute;" class="btn btn-warning btn-xs">
                          <i class="ti-plus"></i>
                        </a><img src="';
                        if($regist['url_img'] != NULL){
                            $data .= $regist['url_img'];
                        } else{
                            $data .= "assets/images/MP.png";
                        }  
                        $data .='" alt="...">
                      <div class="card-body text-center">
                          <h6 class="card-title text-success">'.$regist["nombre"].' '.$regist["marca"].'</h6>
                          <p class="card-text">'.$regist["volumen"].$regist["unidad_medida"].' * '.$regist["unidades"].' UND</p>
                          <p class="card-text">'.$regist["precio_venta"].' BS</p>
                          <h6 class="text-muted">'.$regist["cantidad"].'<small> disponible</small></h6>                            
                      </div>
                  </div>
                </div>';
                $prod=1;
              }else{
                $prod=0;
              }
    	};

      $data .= '</div>';
      $info = [$data,$prod];

      echo json_encode($info);
    }

    function agg(){

      $resp = $this->model->consultarprod($_POST["id"]);

      $resultados [] = [
        "id"=>$resp->getid_prod(),
        "nombre"=>$resp->getnombre_prod(),
        "precio_venta"=>$resp->getprecio_venta_prod(),
        "cantidad"=>$resp->getcantidad_prod()
      ];

      echo json_encode($resultados);

    }

    function registrar(){
        
      if (!empty( $_POST['parametros']["total"] && $_POST['parametros']["fecha"] && $_POST['parametros']["hora"] && $_POST['parametros']['estado'])) {
        if (preg_match("|^[0-9,$]*$|", $_POST['parametros']["total"])) {

          $p=new ventasModel();

          $p->settotal($_POST['parametros']['total']);
          $p->setfecha($_POST['parametros']['fecha']);
          $p->sethora($_POST['parametros']['hora']);
          $p->setestado_movimiento($_POST['parametros']['estado']);
          $p->setid_metodo_pago($_POST['parametros']['metodo']);
          if($_POST['parametros']['cliente'] == ""){
              $cliente=NULL;
          }else{
              $cliente=$_POST['parametros']['cliente'];
          }
          $p->setid_persona($cliente);
          $p->setproductos($_POST['data']);

          $this->model->registrar($p);
          $fecha=date('Y-m-d');
                $accion='Se registro una nueva Venta ';
                $modulo='Ingresos';
                $id=$_SESSION['id_usuario'];
                $this->bitacora->insertar(
                    $fecha,
                    $accion,
                    $modulo,
                    $id);
        }
      }
    }

    public function  listarClientes(){

      $respuesta = $this->model->listarClientes();

      foreach ($respuesta as $r){
        echo'  
        <option value="'.$r->id.'">'.$r->nombre.'</option>';
      };

    }

    public function  listarCategorias(){

      $respuesta = $this->model->listarCategorias();

      foreach ($respuesta as $r){
        echo'  
        <option value="'.$r->id.'">'.$r->categoria.'</option>';
      };

    }

    public function eliminar(){
      $this->model->eliminar($_POST['id']);
      $fecha=date('Y-m-d');
                $accion='Se Anuló una venta con el id: '.$_POST['id'].' ';
                $modulo='Ingresos';
                $id=$_SESSION['id_usuario'];
                $this->bitacora->insertar(
                    $fecha,
                    $accion,
                    $modulo,
                    $id);
    }

    public function buscar(){
      $data = '<div class="row row-cols-1 row-cols-lg-5 row-cols-sm-4 g-3 m-0">';
      $respuesta = $this->model->buscar($_POST["busqueda"]);
      if ($respuesta->rowCount() > 0) {
        foreach ($respuesta as $regist) {
          $data .= '<div class="col p-1 ">
          <div class="card h-100">
              ';
              if ($regist['cantidad']>0) {
                $data.= '<a onclick="agg('.$regist["id"].',1);" style="position: absolute;" class="btn btn-warning btn-xs">
                          <i class="ti-plus"></i>
                        </a><img src="';
                        if($regist['url_img'] != NULL){
                            $data .= $regist['url_img'];
                        } else{
                            $data .= "assets/images/MP.png";
                        }  
                        $data .='" alt="...">
                      <div class="card-body text-center">
                          <h6 class="card-title text-success">'.$regist["nombre"].' '.$regist["marca"].'</h6>
                          <p class="card-text">'.$regist["volumen"].$regist["unidad_medida"].' * '.$regist["unidades"].' UND</p>
                          <p class="card-text">'.$regist["precio_venta"].' BS</p>
                          <h6 class="text-muted">'.$regist["cantidad"].'<small> disponible</small></h6>                            
                      </div>
                  </div>
                </div>';
              }else{
                $data.='No hay productos';
              }
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