<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;

class balanceModel extends Conexion {

    public function __construct(){
        parent::conect();
    }

    public function listar($fecha){
        try {   
            if ($fecha == "d") {

                ini_set('date.timezone','America/Caracas');
                $date = date("Y-m-d"); 
                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre,u.nombre as vendedor FROM movimientos as m, metodo_pago as 
                mp, detalles_movimientos as d, productos as p, usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' 
                AND m.id_concepto_movimiento = 1 AND m.id_metodo_pago=mp.id AND m.id=d.id_movimientos and m.id_usuario=u.id
                AND d.id_producto=p.id AND m.fecha = '$date' GROUP BY m.id";

            }elseif ($fecha == "s") {

                $start_week = strtotime("last monday midnight");
                $end_week = strtotime("+1 week",$start_week);
                $start_week = date("Y/m/d",$start_week);
                $end_week = date("Y/m/d",$end_week);

                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre,u.nombre as vendedor FROM movimientos as m, metodo_pago 
                as mp, detalles_movimientos as d, productos as p, usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' 
                AND m.id_concepto_movimiento = 1 AND m.id_metodo_pago=mp.id AND m.id=d.id_movimientos and m.id_usuario=u.id
                AND d.id_producto=p.id AND m.fecha BETWEEN '$start_week' AND '$end_week' GROUP BY m.id";

            }elseif ($fecha == 'm') {

                $inicio = date("Y-m-01");
                $fin = date("Y-m-t");

                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, u.nombre as vendedor FROM movimientos as m, metodo_pago 
                as mp, detalles_movimientos as d, productos as p, usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' 
                AND m.id_concepto_movimiento = 1 AND m.id_metodo_pago=mp.id AND m.id=d.id_movimientos and m.id_usuario=u.id
                AND d.id_producto=p.id AND m.fecha BETWEEN '$inicio' AND '$fin' GROUP BY m.id";

            }elseif($fecha == 'a'){

                $year_start = strtotime('first day of January', time());
                $year_start = date('Y-m-d', $year_start);

                $year_end = strtotime('last day of December', time());
                $year_end = date('Y-m-d', $year_end);

                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre,u.nombre as vendedor FROM movimientos as m, metodo_pago 
                as mp, detalles_movimientos as d, productos as p, usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' 
                AND m.id_concepto_movimiento = 1 AND m.id_metodo_pago=mp.id AND m.id=d.id_movimientos and m.id_usuario=u.id
                AND d.id_producto=p.id AND m.fecha BETWEEN '$year_start' AND '$year_end' GROUP BY m.id";

            }else{
            
                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, u.nombre as vendedor FROM movimientos as m, metodo_pago 
                as mp, detalles_movimientos as d, productos as p, usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' 
                AND m.id_concepto_movimiento = 1 AND m.id_metodo_pago=mp.id AND m.id=d.id_movimientos and m.id_usuario=u.id
                AND d.id_producto=p.id AND m.fecha= '$fecha' GROUP BY m.id";

            }

                $consulta= Conexion::conect()->prepare($sql);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                return $consulta;


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarEgresos($fecha){
        try {
            if ($fecha == "d") {

                ini_set('date.timezone','America/Caracas');
                $date = date("Y-m-d"); 

                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria, u.nombre as vendedor FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c, usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' and m.id_usuario=u.id
                AND m.id_concepto_movimiento != 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id AND m.fecha = '$date'";

            }elseif ($fecha == "s") {

                $start_week = strtotime("last monday midnight");
                $end_week = strtotime("+1 week",$start_week);
                $start_week = date("Y/m/d",$start_week);
                $end_week = date("Y/m/d",$end_week);

                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria, u.nombre as vendedor FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c, usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' and m.id_usuario=u.id
                AND m.id_concepto_movimiento != 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id AND m.fecha BETWEEN '$start_week' AND '$end_week'";

            }elseif ($fecha == 'm') {

                $inicio = date("Y-m-01");
                $fin = date("Y-m-t");

                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria, u.nombre as vendedor FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c, usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' and m.id_usuario=u.id
                AND m.id_concepto_movimiento != 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id  AND m.fecha BETWEEN '$inicio' AND '$fin'";

            }elseif($fecha == 'a'){

                $year_start = strtotime('first day of January', time());
                $year_start = date('Y-m-d', $year_start);

                $year_end = strtotime('last day of December', time());
                $year_end = date('Y-m-d', $year_end);

                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria, u.nombre as vendedor FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c, usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' and m.id_usuario=u.id
                AND m.id_concepto_movimiento != 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id AND m.fecha BETWEEN '$year_start' AND '$year_end' ";

            }else{

                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria, u.nombre as vendedor FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c, usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' and m.id_usuario=u.id
                AND m.id_concepto_movimiento != 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id AND m.fecha = '$fecha'";

            }

                $consulta= Conexion::conect()->prepare($sql);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                return $consulta;
                


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    public function listarDeudasCobrar($fecha){
        try {
            if ($fecha == "d") {

                ini_set('date.timezone','America/Caracas');
                $date = date("Y-m-d"); 

                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria, u.nombre as vendedor FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c, usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' and m.id_usuario=u.id
                AND m.id_concepto_movimiento != 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id AND m.fecha = '$date'";

            }elseif ($fecha == "s") {

                $start_week = strtotime("last monday midnight");
                $end_week = strtotime("+1 week",$start_week);
                $start_week = date("Y/m/d",$start_week);
                $end_week = date("Y/m/d",$end_week);

                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria, u.nombre as vendedor FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c, usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' and m.id_usuario=u.id
                AND m.id_concepto_movimiento != 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id AND m.fecha BETWEEN '$start_week' AND '$end_week'";

            }elseif ($fecha == 'm') {

                $inicio = date("Y-m-01");
                $fin = date("Y-m-t");

                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria, u.nombre as vendedor FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' and m.id_usuario=u.id
                AND m.id_concepto_movimiento != 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id  AND m.fecha BETWEEN '$inicio' AND '$fin'";

            }elseif($fecha == 'a'){

                $year_start = strtotime('first day of January', time());
                $year_start = date('Y-m-d', $year_start);

                $year_end = strtotime('last day of December', time());
                $year_end = date('Y-m-d', $year_end);

                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria , u.nombre as vendedor FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' and m.id_usuario=u.id
                AND m.id_concepto_movimiento != 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id AND m.fecha BETWEEN '$year_start' AND '$year_end' ";

            }else{

                $sql= "SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria, u.nombre as vendedor FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c, usuarios as u WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA' and m.id_usuario=u.id
                AND m.id_concepto_movimiento != 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id AND m.fecha = '$fecha'";

            }

                $consulta= Conexion::conect()->prepare($sql);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                return $consulta;
                


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function listarproductos($id){
        try {
            
                
                $consulta= Conexion::conect()->prepare(" SELECT d.id, p.nombre, d.cantidad FROM productos as p, detalles_movimientos as d, movimientos 
                as m WHERE p.id = d.id_producto AND d.id_movimientos = :idu GROUP BY d.id ");
                $consulta->bindParam(":idu", $id, PDO::PARAM_INT);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                return $consulta;


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function totales($fecha,$data){
        try {
            if ($data == 1) {
                $operador = "=";
            }else{
                $operador = "!=";
            }
            if ($fecha == "d") {
                
                ini_set('date.timezone','America/Caracas');
                $date = date("Y-m-d"); 

                $sql= "SELECT SUM(total) FROM ( SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA'
                AND m.id_concepto_movimiento $operador 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id AND m.fecha = '$date') as monto";
            
            }elseif ($fecha == "s") {

                $start_week = strtotime("last monday midnight");
                $end_week = strtotime("+1 week",$start_week);
                $start_week = date("Y/m/d",$start_week);
                $end_week = date("Y/m/d",$end_week);

                $sql= "SELECT SUM(total) FROM (SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA'
                AND m.id_concepto_movimiento $operador 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id AND m.fecha BETWEEN '$start_week' AND '$end_week') as monto";
            
            }elseif ($fecha == 'm') {

                $inicio = date("Y-m-01");
                $fin = date("Y-m-t");

                $sql= "SELECT SUM(total) FROM (SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA'
                AND m.id_concepto_movimiento $operador 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id  AND m.fecha BETWEEN '$inicio' AND '$fin') as monto";

            }elseif($fecha == 'a'){

                $year_start = strtotime('first day of January', time());
                $year_start = date('Y-m-d', $year_start);

                $year_end = strtotime('last day of December', time());
                $year_end = date('Y-m-d', $year_end);

                $sql= "SELECT SUM(total) FROM (SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA'
                AND m.id_concepto_movimiento $operador 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id AND m.fecha BETWEEN '$year_start' AND '$year_end') as monto ";

            }else{

                $sql= "SELECT SUM(total) FROM (SELECT m.id, m.fecha, m.hora,m.total,mp.nombre, c.categoria FROM movimientos as
                m, metodo_pago as mp, concepto_movimiento as c WHERE m.estado !=0 AND m.estado_movimiento ='PAGADA'
                AND m.id_concepto_movimiento $operador 1 AND m.id_metodo_pago=mp.id AND m.id_concepto_movimiento = c.id AND m.fecha = '$fecha') as monto";

            }

                $consulta= Conexion::conect()->prepare($sql);
                $consulta->execute();
                $r = $consulta->fetch(PDO::FETCH_ASSOC);
                return $r;
                
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function reciboI($id){
        $sql="SELECT m.id,m.total,m.fecha, u.nombre as vendedor, m.hora,m.estado_movimiento, c.categoria,mp.nombre,
        GROUP_CONCAT(dm.cantidad ,' ',p.nombre,' ',dm.precio,' ',(dm.cantidad*dm.precio)) AS producto FROM 
        movimientos as m, concepto_movimiento as c, metodo_pago as mp, detalles_movimientos as dm, productos as p, 
        usuarios as u WHERE m.id= :id and m.id_concepto_movimiento=c.id and m.id_metodo_pago=mp.id and 
        m.id=dm.id_movimientos and dm.id_producto = p.id and m.id_usuario=u.id;";
        $consulta= Conexion::conect()->prepare($sql);
        $consulta->bindParam(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
        $r = $consulta->fetch(PDO::FETCH_ASSOC);
        return $r;
    }

    public function reciboE($id){
        $sql="SELECT m.id,m.total,m.fecha, u.nombre as vendedor, m.hora,m.estado_movimiento, c.categoria,mp.nombre 
        FROM movimientos as m, concepto_movimiento as c, metodo_pago as mp, usuarios as u WHERE m.id = :id and 
        m.id_concepto_movimiento=c.id and m.id_metodo_pago=mp.id and m.id_usuario=u.id GROUP BY m.id;";
        $consulta= Conexion::conect()->prepare($sql);
        $consulta->bindParam(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
        $r = $consulta->fetch(PDO::FETCH_ASSOC);
        return $r;
    }

    


}

?>