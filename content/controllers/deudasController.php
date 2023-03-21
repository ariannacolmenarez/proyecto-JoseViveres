<?php
namespace content\controllers;
use content\models\deudasModel;
use content\controllers\bitacoraController;
use content\libraries\core\autoload;

class deudasController extends autoload {
    private $model;
    private $bitacora;

    function __construct()
    {
        parent::__construct();
        $this->model = new deudasModel;
        $this->bitacora = new bitacoraController;

    }

    function deudas(){
        $data['page_tag'] = "Cuentas | Market MP";
        $data['page_title'] = "Cuentas";
        parent::getView("deudas", $data);
    }

    public function  listarDeudasPagar(){

        $data = '';
  
        $respuesta = $this->model->listarDeudasPagar();
        $respuesta2=$this->model->totalPagar();
        if(in_array("Consultar Deudas", $_SESSION['permisos'])){ 
            foreach ($respuesta as $regist) {

                  if ($regist['cant'] > 0) {
                      $data.= '<a type="button" onclick="editarDeudaPagar('.$regist['id'].','.$regist['suma'].','.$regist['cant'].');" class="list-group-item text-dark list-group-item-action py-3">
                                <div class="row align-items-center"><div class="col-1 text-secondary fs-4"><span class="badge bg-secondary rounded-pill">'.$regist['cant'].'</span></div>
                                    <div class="col px-4 text-dark fs-5">'.$regist['nombre'].'</div>
                                    <div class="col text-end text-secondary fs-5">'.$regist['suma'].'</div>
                                    <div class="col text-end"><i class="ti-more-alt fa-2x"></i></div>
                                </div> 
                              </a>';
                  }else {
                      $data.= '<div class="text-center"> <h4>No hay registros</h4></div>';
                  }
            };
        }
        $data .= '';

        
  
        echo json_encode([
            'data' => $data,
            'total' => $respuesta2["suma"]
        ]);
    }

    public function  listarDeudasCobrar(){

        $data = '';
  
        $respuesta = $this->model->listarDeudasCobrar();
        if(in_array("Consultar Deudas", $_SESSION['permisos'])){ 
            foreach ($respuesta as $regist) {
                  if ($regist['cant'] > 0) {
                      $data.= '<a type="button" onclick="editarDeudaCobrar('.$regist['id'].','.$regist['suma'].','.$regist['cant'].');" class="list-group-item text-dark list-group-item-action py-3">
                                <div class="row align-items-center"><div class="col-1 text-secondary fs-4"><span class="badge bg-secondary rounded-pill">'.$regist['cant'].'</span></div>
                                    <div class="col px-4 text-dark fs-5">'.$regist['nombre'].'</div>
                                    <div class="col text-end text-secondary fs-5">'.$regist['suma'].'</div>
                                    <div class="col text-end"><i class="ti-more-alt fa-2x"></i></div>
                                </div> 
                              </a>';
                  }else {
                      $data.= '<div class="text-center"> <h4>No hay registros</h4></div>';
                  }
            };
        }
        $data .= '';

        $respuesta2=$this->model->totalCobrar();
  
        echo json_encode([
            'data' => $data,
            'total' => $respuesta2["suma"]
        ]);
    }

    public function movimientosPagar($id){
        $respuesta = $this->model->movimientosPagar($id);
        $resp=$this->model->totalPagar();
        $data='';
        foreach ($respuesta as $regist) {
            $data.= '<a onclick="detallesPagar('.$regist['id'].','.$regist['resto'].','.$resp['suma'].','.$id.');" type="button" class="list-group-item text-dark list-group-item-action py-3">
            <div class="row align-items-center">
              <div class="col-8  text-secondary">'.$regist['categoria'].'</div>
              <div class="col-3 text-end">'.$regist['total'].'<small class="text-muted"> Resta: '.$regist['resto'].'</small></div> 
              <div class="col-1 text-end"><i class="ti-angle-right "></i></div>
            </div> 
          </a>';
          if ($regist['nombre']=="") {
            $nombre="Gasto";
          }else{
            $nombre= $regist['nombre'];
          }
          
        }
        $data .='';
        echo json_encode([
            'data' => $data,
            'nombre' => $nombre
        ]);
    }

    public function movimientosCobrar($id){
        $respuesta = $this->model->movimientosCobrar($id);
        $resp=$this->model->totalCobrar();
        $data='';
        foreach ($respuesta as $regist) {
            $data.= '<a type="button" onclick="detallesCobrar('.$regist['id'].','.$regist['resto'].','.$resp['suma'].','.$id.')" class="list-group-item text-dark list-group-item-action py-3">
            <div class="row align-items-center">
              <div class="col-6 text-secondary">'.$regist['productos'].'</div>
              <div class="col-5 text-end">'.$regist['total'].'<small class="text-muted"> Resta: '.$regist['resto'].'</small></div>
              <div class="col-1 text-end"><i class="ti-angle-right "></i></div>
            </div> 
          </a>';
          $nombre=$regist['nombre'];
        }
        $data .='';
        echo json_encode([
            'data' => $data,
            'nombre'=>$nombre
        ]);
    }

    public function detallesPagar($id){
        $resp = $this->model->detallesPagar($id);
        echo json_encode($resp);
    }

    public function detallesCobrar($id){
        $resp = $this->model->detallesCobrar($id);
        $productos = $this->model->detallesCobrarProd($id,$resp->fecha);
        $data='<thead>
            <tr>
            <th scope="col">Producto</th>
            <th scope="col">Cant</th>
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">';
        foreach ($productos as $regist) {
            
            $data.= ' <tr>
            <td>'.$regist['nombre'].'</td>
            <td>'.$regist['cantidad'].'</td>
            <td>'.$regist['precio'].'</td>
            </tr>
            <tr>';
        }
        $data .='</tbody>';
        echo json_encode([
            'data' => $resp,
            'productos'=>$data
        ]);
    }

    public function abonar($tipo){
        if (!empty($_POST['id'] && $_POST['metodo'] && $_POST['valor']&& $_POST['fecha'] )) {
            if (preg_match("|^[a-zA-Z0-9]+(\s*[a-zA-Z0-9]*)*[a-zA-Z0-9]+$|", $_POST['concepto'] )&&
                preg_match("|^[0-9,$]*$|", $_POST['valor'])) {
                $p=new deudasModel();

                $p->setid_abono($_POST['id']);
                $p->setmetodo_abono($_POST['metodo']);
                $p->setvalor_abono($_POST['valor']);
                $p->setconcepto_abono($_POST['concepto']);
                $p->setfecha_abono($_POST['fecha']);
                $persona=$_POST['persona'];

                $this->model->registrarAbono($p,$tipo,$persona);
                $fecha=date('Y-m-d');
                $accion='Se registro un nuevo abono a la cuenta con id= '.$persona.' ';
                $modulo='Deudas';
                $id=$_SESSION['id_usuario'];
                $this->bitacora->insertar(
                    $fecha,
                    $accion,
                    $modulo,
                    $id);
                var_dump($persona);
            }
        }
    }

    public function eliminar(){
        $this->model->eliminar($_POST['id']);
    }

    public function eliminarAbono($id){
        $this->model->eliminarAbono($id);
    }

    public function  listarAbonos($id){
        $data = ''; 
        $respuesta = $this->model->listarAbonos($id,$_POST['tipo']);
        foreach ($respuesta as $regist) 
        {
            $data .='<a onclick="detallesPagar();" type="button" class="list-group-item text-dark list-group-item-action py-3">
            <div class="row align-items-center">
              <div class="col-5  text-secondary">'.$regist['concepto'].'</div>
              <div class="col-3  text-secondary">'.$regist['fecha'].'</div>
              <div class="col-2 text-end">'.$regist['valor'].'</div> 
              <div class="col-2">
                <button onclick="eliminarAbono('.$regist['id'].');" class="btn btn-danger btn-rounded btn-icon">
                    <i class="ti-trash"></i> 
                </button><br><small class="text-danger" >Eliminar</small>
              </div>
            </div> 
          </a>';
        }
        echo json_encode([
            'data' => $data
        ]);
    }
}
?>