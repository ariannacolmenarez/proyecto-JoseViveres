<?php
namespace content\controllers;
use content\libraries\core\autoload;
use content\models\reportedeudasModel;

class reportedeudasController extends autoload {
  private $model;

    public function __construct(){
        parent::__construct();
        $this->model = new reportedeudasModel;

    }

    public function reporteDeudas(){
        $data['page_tag'] = "Reporte Deudas | Market MP";
        $data['page_title'] = "Reporte Deudas";
        parent::getView("reporteDeudas", $data);   
    }

    public function getDeudas(){
        $result = $this->model->getBalance($_POST['datos']);
        if($result == ''){
            echo 0;
        }
        else{
            $result = json_decode(json_encode($result),true);
            $tabla = '<div style="margin-left:auto; margin-right:auto;width:100%">
            <table <table class="table" style="width:100%;">
            <thead><tr style=" -webkit-print-color-adjust: exact; height:30px">
            <th class="w-50" style="text-align:center">Deudas</th>
            <th class="w-50" style="text-align:center">Total</th>
            </tr></thead><tbody>';
            
            $cont=0;
            $contTotal=0;
        //        $result['Gastos pagos'] = json_decode(json_encode($result['Gastos pagos']),true);
                $tabla.='<tr style="color:white;background:gray; -webkit-print-color-adjust: exact; height:30px">
                <td class="w-100" colspan="2" style="text-align:center">Gastos por pagar</td>
                </tr>';
                foreach($result as $ac){
                $tabla.='<tr style="height:30px">
                <td class="w-50" style="text-align:center">'.$ac['concepto'].'</td>
                <td class="w-50" style="text-align:center">'.floatval($ac['total_pagado']).'</td>
                </tr>';
                $cont=$cont+floatval($ac['total_pagado']);
                }
                $tabla.='<thead><tr style=" -webkit-print-color-adjust: exact; height:30px">
                <th class="w-50" style="text-align:center">Total gastos por pagar</th>
                <th class="w-50" style="text-align:center">'.$cont.'</th>
                </tr></thead>';

            $contTotal=floatval($contTotal) + floatval($cont);

            $tabla.='<tr style="height:30px">
            <td class="w-100" colspan="2" style="text-align:center"></td>
            </tr>
            <thead><tr style="height:30px; -webkit-print-color-adjust: exact">
            <th class="w-50" style="text-align:center">Total de deudas</th>
            <th class="w-50" style="text-align:center">'.$contTotal.'</th>
            </tr></thead></table></div>';
            echo $tabla ;

        }
    }

}

?>