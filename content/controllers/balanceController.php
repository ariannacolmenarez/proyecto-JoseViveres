<?php
namespace content\controllers;
use content\models\balanceModel;
use content\libraries\core\autoload;

class balanceController extends autoload {
  private $model;
    function __construct()
    {
        parent::__construct();
        $this->model = new balanceModel;

    }

    function balance(){
        
        $data['page_tag'] = "Balance | Market MP";
        $data['page_title'] = "Balance";
        parent::getView("balance", $data);
    }

    public function  listar(){

        $data = '<table class="table" id="example">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Fecha - Hora</th>
                  <th>Concepto</th>
                  <th>Medio de pago</th>
                  <th>Valor</th>
                  <th>Vendedor</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>';
        
        $respuesta = $this->model->listar($_POST['fecha']);
  
          foreach ($respuesta as $regist) {
            if(in_array("Consultar Ventas", $_SESSION['permisos'])){
            $data .= '<tr>
              <td>'.$regist['id'].'</td>
              <td>'.$regist['fecha'].'-'.$regist['hora'].'</td>
              <td>';
            $productos=$this->model->listarproductos($regist['id']);
            
            foreach($productos as $prod){
                if ($productos) {
                    $data.=''.$prod['cantidad'].'-'.$prod['nombre'].'  ';
                }else{
                    $data.='';
                }
                
            }
            
            $data.='</td><td>'.$regist['nombre'].'</td>
              <td>'.$regist['total'].'</td>
              <td>'.$regist['vendedor'].'</td>
              <td>
                <div class="row">';
                if(in_array("Anular Ventas", $_SESSION['permisos'])){ $data.='
                  <div class="col">
                    <button onclick="eliminarVenta('.$regist['id'].');" class="btn btn-outline-danger btn-rounded btn-icon">
                      <i class="ti-na"></i>
                    </button>
                  </div>';
                  }
                  $data.='
                  <div class="col">
                    <button onclick="reciboVenta('.$regist['id'].');" class="btn btn-outline-secondary btn-rounded btn-icon">
                      <i class="ti-receipt"></i>
                    </button>
                  </div></div>
              </td>
            </tr>';
          };
          }
        $data .= '</tbody>
        </table>';
  
        echo json_encode($data);
      }

    public function  listarEgresos(){

        $data = '<table class="table" id="example2">
              <thead>
                <tr>
                  <th>Fecha - Hora</th>
                  <th>Concepto</th>
                  <th>Medio de pago</th>
                  <th>Valor</th>
                  <th>Vendedor</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>';
  
        $respuesta = $this->model->listarEgresos($_POST['fecha']);
        
          foreach ($respuesta as $regist) {
            if(in_array("Consultar Gastos", $_SESSION['permisos'])){
            $data .= '<tr>
              <td>'.$regist['fecha'].'-'.$regist['hora'].'</td>
              <td>'.$regist['categoria'].'</td>
              <td>'.$regist['nombre'].'</td>
              <td>'.$regist['total'].'</td>
              <td>'.$regist['vendedor'].'</td>
              <td>
                <div class="row">';
                if(in_array("Eliminar Gastos", $_SESSION['permisos'])){ $data.='
                  <div class="col">
                    <button onclick="eliminarGasto('.$regist['id'].');" class="btn btn-outline-danger btn-rounded btn-icon">
                      <i class="ti-trash"></i>
                    </button>
                  </div>';
                }
                $data.='
                  <div class="col">
                    <button onclick="reciboGasto('.$regist['id'].');" class="btn btn-outline-secondary btn-rounded btn-icon">
                      <i class="ti-receipt"></i>
                    </button>
                  </div>
                </div>
              </td>
            </tr>';
            }
          };
  
        $data .= '</tbody>
        </table>';
  
        echo json_encode($data);
    }

    public function totales(){
        $respuesta = $this->model->totales($_POST['fecha'],$_POST['data']);
        if ($respuesta["SUM(total)"] == NULL) {
          echo 0;
        }else {
          echo $respuesta["SUM(total)"];
        }
    }

    public function reciboI(){
      
      $resp=$this->model->reciboI($_POST['id']);
      $productos = explode(",", $resp['producto']);
      $prod []= [];
      foreach ($productos as $clave => $valor) {  
        $exp=explode(" ", $valor);
        array_push($prod, $exp);
      }
      $table="";
      unset($prod[0]);
      foreach ($prod as $valor){
        $table.='<tr>
                  <td>'.$valor[0].'</td>
                  <td>'.$valor[1].'</td>
                  <td>'.$valor[2].'</td>
                  <td>'.$valor[3].'</td>
                </tr>';
      }
      $table.="";
      $data='<div class="card">
              <div class="card-body">
                <div style="text-align:center" class="row">
                  <div class="col text-center">
                    <h3 class="display-3 text-dark">Market MP</h3>
                  </div>
                </div>
                <div style="text-align:center" class="row">
                  <div class="text-center col display-5 text-secondary">
                    <i class="ti-home btn-icon-prepend"></i> RIF: 12020332-7
                  </div>
                  <div class="text-center col display-5 text-secondary">
                    <i class="ti-location-pin btn-icon-prepend"></i> RIF: calle 03, calle principal el Frío, Duaca, Lara
                  </div>
                </div>
                <div style="text-align:center" class="row mt-2">
                  <div class="text-center col display-5 text-secondary">
                    <i class="ti-agenda btn-icon-prepend"></i> 04169594929
                  </div>
                  <div class="text-center col display-5 text-secondary">
                    <i class="ti-email btn-icon-prepend"></i> marketmp@gmail.com
                  </div>
                </div>
                <hr>
                <div  class="row mt-2">
                  <div style="text-align:left; display:inline;" class=" col display-5 text-secondary">
                    Fecha de transacción:
                  </div>
                  <div style="text-align:right;" class="text-end col display-5 text-secondary">
                    '.$resp['fecha'].' - '.$resp['hora'].'
                  </div>
                </div>
                <div  class="row mt-2">
                  <div "text-align:left; display:inline;" class=" col display-5 text-secondary">
                    Método de pago:
                  </div>
                  <div style="text-align:right; " class="text-end col display-5 text-secondary">
                  '.$resp['nombre'].'
                  </div>
                </div>
                <div  class="row mt-2">
                  <div "text-align:left; display=inline;" class=" col display-5 text-secondary">
                    Estado del pago:
                  </div>
                  <div style="text-align:right; " class="text-end col display-5 text-secondary">
                  '.$resp['estado_movimiento'].'
                  </div>
                </div>
                <div  class="row mt-2">
                  <div "text-align:left; display=inline;" class=" col display-5 text-secondary">
                    Categoría:
                  </div>
                  <div style="text-align:right; " class="text-end col display-5 text-secondary">
                  '.$resp['categoria'].'
                  </div>
                </div>
                <div  class="row mt-2">
                  <div "text-align:left; display=inline;" class=" col display-5 text-secondary">
                    codigo de transacción:
                  </div>
                  <div style="text-align:right; " class="text-end col display-5 text-secondary">
                  '.$resp['id'].'
                  </div>
                </div>
                <div  class="row mt-2">
                  <div "text-align:left; display=inline;" class=" col display-5 text-secondary">
                    Vendedor:
                  </div>
                  <div style="text-align:right; " class="text-end col display-5 text-secondary">
                  '.$resp['vendedor'].'
                  </div>
                </div>
                <hr>
                <h4 style="text-align:center">Productos</h4>
                <table style="margin: 0 auto;" FRAME="void" RULES="rows">
                  <thead >
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Total</th>
                  </thead>
                  <tbody>
                    '.$table.'
                  </tbody>
                  <thead>
                    <th "text-align:left; display=inline;">Total</th>
                    <th style="text-align:right; ">'.$resp['total'].'</th>
                  </thead>
                </table>
              </div>
            </div>';
      echo $data; 
    }

    public function reciboE(){
      
      $resp=$this->model->reciboE($_POST['id']);
      $data='<div class="card">
              <div class="card-body">
                <div style="text-align:center" class="row">
                  <div class="col text-center">
                    <h3 class="display-3 text-dark">Market MP</h3>
                  </div>
                </div>
                <div style="text-align:center" class="row">
                  <div class="text-center col display-5 text-secondary">
                    <i class="ti-home btn-icon-prepend"></i> RIF: 12020332-7
                  </div>
                  <div class="text-center col display-5 text-secondary">
                    <i class="ti-location-pin btn-icon-prepend"></i> RIF: calle 03, calle principal el Frío, Duaca, Lara
                  </div>
                </div>
                <div style="text-align:center" class="row mt-2">
                  <div class="text-center col display-5 text-secondary">
                    <i class="ti-agenda btn-icon-prepend"></i> 04169594929
                  </div>
                  <div class="text-center col display-5 text-secondary">
                    <i class="ti-email btn-icon-prepend"></i> marketmp@gmail.com
                  </div>
                </div>
                <hr>
                <div  class="row mt-2">
                  <div style="text-align:left; display:inline;" class=" col display-5 text-secondary">
                    Fecha de transacción:
                  </div>
                  <div style="text-align:right;" class="text-end col display-5 text-secondary">
                    '.$resp['fecha'].' - '.$resp['hora'].'
                  </div>
                </div>
                <div  class="row mt-2">
                  <div "text-align:left; display:inline;" class=" col display-5 text-secondary">
                    Método de pago:
                  </div>
                  <div style="text-align:right; " class="text-end col display-5 text-secondary">
                  '.$resp['nombre'].'
                  </div>
                </div>
                <div  class="row mt-2">
                  <div "text-align:left; display=inline;" class=" col display-5 text-secondary">
                    Estado del pago:
                  </div>
                  <div style="text-align:right; " class="text-end col display-5 text-secondary">
                  '.$resp['estado_movimiento'].'
                  </div>
                </div>
                <div  class="row mt-2">
                  <div "text-align:left; display=inline;" class=" col display-5 text-secondary">
                    Categoría:
                  </div>
                  <div style="text-align:right; " class="text-end col display-5 text-secondary">
                  '.$resp['categoria'].'
                  </div>
                </div>
                <div  class="row mt-2">
                  <div "text-align:left; display=inline;" class=" col display-5 text-secondary">
                    codigo de transacción:
                  </div>
                  <div style="text-align:right; " class="text-end col display-5 text-secondary">
                  '.$resp['id'].'
                  </div>
                </div>
                <div  class="row mt-2">
                  <div "text-align:left; display=inline;" class=" col display-5 text-secondary">
                    Vendedor:
                  </div>
                  <div style="text-align:right; " class="text-end col display-5 text-secondary">
                  '.$resp['vendedor'].'
                  </div>
                </div>
              </div>
            </div>';
      echo $data; 
    }


}

?>