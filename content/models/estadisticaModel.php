<?php 
namespace content\models;
use content\libraries\core\Conexion;
use PDO;
class estadisticaModel extends Conexion {

    public function __construct(){
        parent::conect();
    }

    public function calcularEstadistica($info) {
        $sql = "SELECT ";
        $procesedInfo = $info;
        switch ($info['cons']){
            case 'Gasto':
                $sql .= "* FROM movimientos m WHERE m.id_concepto_movimiento <> 1 ";
            break;
            case 'Venta':
                $sql .= "* FROM movimientos m WHERE m.id_concepto_movimiento = 1 ";
            break;
            default:
               $sql .= "p.nombre, dm.cantidad FROM productos p, detalles_movimientos dm, movimientos m WHERE 
               dm.id_movimientos = m.id AND dm.id_producto = p.id ";
            break;
        }

        switch ($info['tipoRango']){
            case 'Semanal':
                $fechas = explode('-',$info['rango']);
                $fechaInicio = explode('/',$fechas[0]);
                $fechaFin = explode('/',$fechas[1]);
                $fechaFin[0] = substr($fechaFin[0], 1);
                $fechaInicio[2] = substr($fechaInicio[2], 0, -1);

                if(strlen($fechaInicio[0])<2){
                    $fechaInicio[0] = '0'.$fechaInicio[0];
                }

                if(strlen($fechaInicio[1])<2){
                    $fechaInicio[1] = '0'.$fechaInicio[1];
                }

                if(strlen($fechaFin[0])<2){
                    $fechaFin[0] = '0'.$fechaFin[0];
                }      

                if(strlen($fechaFin[1])<2){
                    $fechaFin[1] = '0'.$fechaFin[1];
                }

                $fechaInicio = $fechaInicio[2].'-'.$fechaInicio[0].'-'.$fechaInicio[1];
                $fechaFin = $fechaFin[2].'-'.$fechaFin[0].'-'.$fechaFin[1];

                $procesedInfo['rango'] = [
                    'fechaInicio' => $fechaInicio,
                    'fechaFin' => $fechaFin
                ];

                $sql .= "AND m.fecha >= '".$fechaInicio."' AND m.fecha <= '".$fechaFin."'";
            break;
            case 'Anual':
                $sql .= "AND m.fecha LIKE '".$info['rango']."%'";
            break;
            default:
                $fecha = explode('-',$info['rango']);
                $fecha = $fecha[1].'-'.$fecha[0];
                $procesedInfo['rango'] = $fecha;
                $sql .= "AND m.fecha LIKE '".$fecha."%'";
            break;
        }
            try {
                    $consulta= Conexion::conect()->prepare($sql);
                    $consulta->execute();
                    $resultado = [
                        'consulta' => $consulta->fetchALL(PDO::FETCH_OBJ),
                        'info' => $procesedInfo
                    ];
                    return $resultado;
            
                } catch (Exception $e) {
                    die($e->getMessage());
                }
    }
}


?>