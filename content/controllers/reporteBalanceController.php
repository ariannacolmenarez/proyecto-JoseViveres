<?php
namespace content\controllers;
use content\libraries\core\autoload;
use content\models\reportebalanceModel;

class reportebalanceController extends autoload {
  private $model;

    public function __construct(){
        parent::__construct();
        $this->model = new reportebalanceModel;

    }

    public function reporteBalance(){
        $data['page_tag'] = "Reporte Balance | Market MP";
        $data['page_title'] = "Reporte Balance";
        parent::getView("reporteBalance", $data);   
    }

    public function getBalance(){
        $result = $this->model->getBalance($_POST['datos']);
        if($result == ''){
            echo 0;
        }
        else{
            $tabla = '<div style="margin-left:auto; margin-right:auto;width:100%">
            <table class="table" style="width:100%;">
            <thead>
            <tr style=" -webkit-print-color-adjust: exact; height:30px">
            <th class="w-50" style="text-align:center">Activos</th>
            <th class="w-50" style="text-align:center">Total</th>
            </tr></thead><tbody>';
            
            $cont=0;
            $contTotal=0;
            if($result['Activos en caja']!=[]){
                $result['Activos en caja'] = json_decode(json_encode($result['Activos en caja']),true);
                $tabla.='<tr style="color:white;background:gray; -webkit-print-color-adjust: exact; height:30px">
                <td class="w-100" colspan="2" style="text-align:center">Activos en caja</td>
                </tr>';
                foreach($result['Activos en caja'] as $ac){
                $tabla.='<tr style="height:30px">
                <td class="w-50" style="text-align:center">Venta de '.$ac['nombre_producto'].'</td>
                <td class="w-50" style="text-align:center">'.floatval($ac['total_venta']).'</td>
                </tr>';
                $cont=$cont+floatval($ac['total_venta']);
                }
                $tabla.='<thead><tr style=" -webkit-print-color-adjust: exact; height:30px">
                <th class="w-50" style="text-align:center">Total activos en caja</th>
                <th class="w-50" style="text-align:center">'.$cont.'</th>
                </tr></thead>';
            }

            $contTotal=floatval($contTotal) + floatval($cont);
            $cont=0;

            if($result['Activos por cobrar']!=[]){
                $result['Activos por cobrar'] = json_decode(json_encode($result['Activos por cobrar']),true);
                $tabla.='<tr style="color:white;background:gray; -webkit-print-color-adjust: exact; height:30px">
                <td class="w-100" colspan="2" style="text-align:center">Activos por cobrar</td>
                </tr>';
                foreach($result['Activos por cobrar'] as $ac){
                $tabla.='<tr style="height:30px">
                <td class="w-50" style="text-align:center">Venta de '.$ac['nombre_producto'].'</td>
                <td class="w-50" style="text-align:center">'.floatval($ac['total_venta']).'</td>
                </tr>';
                $cont=$cont+floatval($ac['total_venta']);
                }
                $tabla.='<thead><tr style=" -webkit-print-color-adjust: exact; height:30px">
                <th class="w-50" style="text-align:center">Total activos por cobrar</th>
                <th class="w-50" style="text-align:center">'.$cont.'</th>
                </tr></thead>';
            }

            $contTotal=floatval($contTotal) + floatval($cont);
            $cont=0;

            if($result['Gastos pagos']!=[]){
                $result['Gastos pagos'] = json_decode(json_encode($result['Gastos pagos']),true);
                $tabla.='<tr style="color:white;background:gray; -webkit-print-color-adjust: exact; height:30px">
                <td class="w-100" colspan="2" style="text-align:center">Gastos pagos</td>
                </tr>';
                foreach($result['Gastos pagos'] as $ac){
                $tabla.='<tr style="height:30px">
                <td class="w-50" style="text-align:center">'.$ac['concepto'].'</td>
                <td class="w-50" style="text-align:center">'.floatval($ac['total_pagado']).'</td>
                </tr>';
                $cont=$cont+floatval($ac['total_pagado']);
                }
                $tabla.='<thead><tr style=" -webkit-print-color-adjust: exact; height:30px">
                <th class="w-50" style="text-align:center">Total gastos pagos</th>
                <th class="w-50" style="text-align:center">'.$cont.'</th>
                </tr></thead>';
            }

            $contTotal=floatval($contTotal) + floatval($cont);

            $tabla.='<tr style="height:30px">
            <td class="w-100" colspan="2" style="text-align:center"></td>
            </tr>
            <thead><tr style="height:30px; -webkit-print-color-adjust: exact">
            <th class="w-50" style="text-align:center">Total de activos</th>
            <th class="w-50" style="text-align:center">'.$contTotal.'</th>
            </tr></thead></tbody></table></div>';
            echo $tabla;
        }
    }

}

?>