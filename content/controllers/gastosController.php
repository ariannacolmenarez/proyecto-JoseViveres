<?php
namespace content\controllers;
use content\models\gastosModel;
use content\controllers\bitacoraController;
use content\libraries\core\autoload;

class gastosController extends autoload {
  private $model;
  private $bitacora;

    public function __construct(){
        parent::__construct();
        $this->model = new gastosModel;
        $this->bitacora = new bitacoraController;

    }

    // public function  consultarCategorias(){
    //   $data = '<select class="form-select  mb-3 shadow-none" aria-label=".form-select example">
    //                 <option selected disabled>Selecciona una categoría</option>';

    //         $respuesta = $this->model->listar();

    // 	foreach ($respuesta as $regist) 
    // 	{
    // 		$data .= '<option value="'.$regist["id"].'">'.$regist["categoria"].'</option>';
    // 	};

    // $data .= '</select>';

    // echo json_encode($data);

    // }

    public function  listarCategorias(){

      $respuesta = $this->model->listarCategorias();

      foreach ($respuesta as $r){
        echo'  
        <option class="p-5" value="'.$r->id.'">'.$r->categoria.'</option>';
      };
  
    }

    public function  listarProveedores(){

      $respuesta = $this->model->listarProveedores();

      foreach ($respuesta as $r){
        echo'  
        <option class="p-5" value="'.$r->id.'">'.$r->nombre.'</option>';
      };

    }

    function registrar(){
        
      if (!empty( $_POST["monto"] && $_POST["categoria"] && $_POST["fecha"] && $_POST["hora"] && $_POST['estado'])) {
        if (preg_match("|^[a-zA-Z0-9]+(\s*[a-zA-Z0-9]*)*[a-zA-Z0-9]+$|", $_POST['nombre'] )&&
                preg_match("|^[0-9,$]*$|", $_POST['monto'])) {
          $p=new gastosModel();

          $p->setmonto($_POST['monto']);
          $p->setfecha($_POST['fecha']);
          $p->sethora($_POST['hora']);
          $p->setestado_movimiento($_POST['estado']);
          $p->setid_metodo_pago($_POST['metodo']);
          if($_POST['proveedor'] == ""){
              $proveedor=NULL;
          }else{
              $proveedor=$_POST['proveedor'];
          }
          $p->setid_persona($proveedor);
          $p->setconcepto($_POST['categoria']);
          $p->setnombre($_POST['nombre']);

          $this->model->registrar($p);
          $fecha=date('Y-m-d');
          $accion='Se registro un nuevo Gasto con concepto de: '.$_POST['nombre'].' por el monto de '.$_POST['monto'].' y fue '.$_POST['estado'].'';
          $modulo='Gastos';
          $id=$_SESSION['id_usuario'];
          $this->bitacora->insertar(
              $fecha,
              $accion,
              $modulo,
              $id);
        }   
      }
    }

    public function eliminar(){
			$this->model->eliminar($_POST['id']);
      $fecha=date('Y-m-d');
        $accion='Se elimino el Gasto con id: '.$_POST['id'].' ';
        $modulo='Gastos';
        $id=$_SESSION['id_usuario'];
        $this->bitacora->insertar(
            $fecha,
            $accion,
            $modulo,
            $id);
   	}


}

?>