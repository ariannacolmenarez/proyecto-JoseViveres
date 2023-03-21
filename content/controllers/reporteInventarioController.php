<?php
namespace content\controllers;
use content\libraries\core\autoload;
use content\models\reporteinventarioModel;

class reporteinventarioController extends autoload {
  private $model;

    public function __construct(){
        parent::__construct();
        $this->model = new reporteinventarioModel;

    }

    public function reporteInventario(){
        $data['page_tag'] = "Reporte Invetario | Market MP";
        $data['page_title'] = "Reporte Invetario";
        parent::getView("reporteInventario", $data);   
    }

    public function getInventario(){
        $result = $this->model->getInventario();
        $result = json_decode(json_encode($result),true);
        $tabla="<table class='w-100 table'>
        <thead><tr style='-webkit-print-color-adjust: exact;'>
        <th colspan='5'>Inventario</th>
        </tr></thead>
        <thead>
        <tr style='-webkit-print-color-adjust: exact;'>
        <th>Código</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>Precio de costo</th>
        <th>Precio de venta</th>
        </tr></thead><tbody>";
        
        foreach($result as $r){
            $tabla.="
            <tr style='height:30px'>
            <td>".$r['id']."</td>
            <td>".$r['nombre']." ".$r['marca']." ".$r['volumen']." ".$r['unidad_medida']."*".$r['unidades']."</td>
            <td>".$r['cantidad']."</td>
            <td>".$r['precio_costo']."</td>
            <td>".$r['precio_venta']."</td>
            </tr>";
        }

        $tabla.="</tbody></table>";

        echo $tabla;
        
    }

}

?>