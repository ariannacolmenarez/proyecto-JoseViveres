<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;

class deudasModel extends Conexion{
   
    private $id_abono;
    private $metodo_abono;
    private $valor_abono;
    private $concepto_abono;
    private $fecha_abono;

    public function __construct(){
        parent::conect();
    }

    public function getid_abono(){
        return $this->id_abono;
    }

    public function setid_abono( $id_abono){
        $this->id_abono=$id_abono;
    }

    public function getmetodo_abono(){
        return $this->metodo_abono;
    }

    public function setmetodo_abono( $metodo_abono){
        $this->metodo_abono=$metodo_abono;
    }

    public function getvalor_abono(){
        return $this->valor_abono;
    }

    public function setvalor_abono( $valor_abono){
        $this->valor_abono=$valor_abono;
    }

    public function getconcepto_abono(){
        return $this->concepto_abono;
    }

    public function setconcepto_abono( $concepto_abono){
        $this->concepto_abono=$concepto_abono;
    }

    public function getfecha_abono(){
        return $this->fecha_abono;
    }

    public function setfecha_abono( $fecha_abono){
        $this->fecha_abono=$fecha_abono;
    }


    public function listarDeudasPagar(){
        try {
            $sql= "SELECT p.nombre, SUM(m.total)as monto, COUNT(m.id) as cant ,p.id, SUM( CASE WHEN (SELECT SUM(monto) FROM abono_movimiento WHERE id_movimiento=m.id) IS NULL THEN (SELECT total FROM movimientos WHERE id=m.id) ELSE ((SELECT total FROM movimientos WHERE id=m.id)-(SELECT SUM(monto) FROM abono_movimiento WHERE id_movimiento=m.id)) END) as suma FROM movimientos as m, concepto_movimiento as c, proveedores as p WHERE m.id_concepto_movimiento=c.id AND c.id != 1 AND m.estado_movimiento = 'A CREDITO' AND m.id_proveedor=p.id AND m.estado =1 group by nombre";

            $consulta= Conexion::conect()->prepare($sql);
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta->execute();
            return $consulta;
                


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarDeudasCobrar(){
        try {
            $sql= "SELECT p.nombre, SUM(m.total)as monto, COUNT(m.id) as cant ,p.id, SUM( CASE WHEN (SELECT SUM(monto) FROM abono_movimiento WHERE id_movimiento=m.id) IS NULL THEN (SELECT total FROM movimientos WHERE id=m.id) ELSE ((SELECT total FROM movimientos WHERE id=m.id)-(SELECT SUM(monto) FROM abono_movimiento WHERE id_movimiento=m.id)) END) as suma FROM movimientos as m, concepto_movimiento as c, clientes as p WHERE m.id_concepto_movimiento=c.id AND c.id = 1 AND m.estado_movimiento = 'A CREDITO' AND m.id_cliente=p.id AND m.estado =1 group by nombre";

            $consulta= Conexion::conect()->prepare($sql);
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta->execute();
            return $consulta;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function totalCobrar(){
        try {
        
            $sql= "SELECT SUM( CASE WHEN (SELECT SUM(monto) FROM abono_movimiento WHERE
            id_movimiento=m.id) IS NULL THEN (SELECT total FROM movimientos WHERE id=m.id) 
            ELSE ((SELECT total FROM movimientos WHERE id=m.id)-(SELECT SUM(monto) FROM 
            abono_movimiento WHERE id_movimiento=m.id)) END) as suma FROM movimientos as m, 
            concepto_movimiento as c, clientes as p WHERE m.id_concepto_movimiento = c.id 
            AND c.id = 1 AND m.estado_movimiento = 'A CREDITO' AND m.id_cliente=p.id AND m.estado =1";
            
            $consulta= Conexion::conect()->prepare($sql);
            $consulta->execute();
            $r = $consulta->fetch(PDO::FETCH_ASSOC);
            return $r;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function totalPagar(){
        try {
        
            $sql= "SELECT SUM( CASE WHEN (SELECT SUM(monto) FROM abono_movimiento WHERE
             id_movimiento=m.id) IS NULL THEN (SELECT total FROM movimientos WHERE id=m.id) 
             ELSE ((SELECT total FROM movimientos WHERE id=m.id)-(SELECT SUM(monto) FROM 
             abono_movimiento WHERE id_movimiento=m.id)) END) as suma FROM movimientos as m, 
             concepto_movimiento as c, proveedores as p WHERE m.id_concepto_movimiento=c.id 
             AND c.id != 1 AND m.estado_movimiento = 'A CREDITO' AND m.id_proveedor=p.id AND m.estado =1";
            
            $consulta= Conexion::conect()->prepare($sql);
            $consulta->execute();
            $r = $consulta->fetch(PDO::FETCH_ASSOC);
            return $r;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function movimientosPagar($id){
        $sql= "SELECT c.categoria,m.total,p.nombre,m.id, CASE WHEN 
        (SELECT SUM(monto) FROM abono_movimiento WHERE id_movimiento=m.id) 
        IS NULL THEN (SELECT total FROM movimientos WHERE id=m.id) ELSE 
        ((SELECT total FROM movimientos WHERE id=m.id)-(SELECT SUM(monto) 
        FROM abono_movimiento WHERE id_movimiento=m.id)) END AS resto FROM 
        movimientos as m, concepto_movimiento as c, proveedores as p WHERE 
        m.id_concepto_movimiento=c.id AND c.id != 1 AND m.estado_movimiento = 'A CREDITO' 
        AND m.id_proveedor=p.id AND p.id=$id AND m.estado =1 GROUP BY m.id";

        $consulta= Conexion::conect()->prepare($sql);
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
        return $consulta;
    }

    public function movimientosCobrar($id){
        $sql= "SELECT m.total,p.nombre,m.id, GROUP_CONCAT(d.cantidad ,' ',pr.nombre) as productos, CASE WHEN (SELECT SUM(monto) FROM abono_movimiento WHERE id_movimiento=m.id) IS NULL THEN (SELECT total FROM movimientos WHERE id=m.id) ELSE ((SELECT total FROM movimientos WHERE id=m.id)-(SELECT SUM(monto) FROM abono_movimiento WHERE id_movimiento=m.id)) END AS resto FROM movimientos as m, clientes as p, detalles_movimientos as d, productos as pr WHERE m.id_concepto_movimiento = 1 AND d.id_movimientos=m.id and d.id_producto=pr.id AND m.estado_movimiento = 'A CREDITO' AND m.id_cliente=p.id AND p.id=$id AND m.estado =1 GROUP BY m.id";

        $consulta= Conexion::conect()->prepare($sql);
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
        return $consulta ;
    }

    public function detallesPagar($id){
        try {
            $consulta= Conexion::conect()->prepare("SELECT c.categoria, m.fecha, m.total ,m.nombre 
            FROM movimientos as m, concepto_movimiento as c WHERE m.id=$id and 
            c.id=m.id_concepto_movimiento");
            $consulta->execute();
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            
            return $r;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function detallesCobrar($id){
        try {
            $consulta= Conexion::conect()->prepare("SELECT m.fecha, m.total ,p.nombre FROM
             movimientos as m, clientes as p WHERE m.id=$id and m.id_cliente=p.id");
            $consulta->execute();
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            return $r;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function detallesCobrarProd($id,$fecha){
        try {
            $consulta= Conexion::conect()->prepare("SELECT p.nombre, (SELECT precio_venta FROM ingreso_detalles as id, ingreso_productos as i WHERE id.id_producto = p.id AND id.id_ingreso=i.id AND i.fecha < $fecha ORDER BY i.fecha DESC ) as precio_venta, d.cantidad, d.precio, m.id FROM movimientos AS m, detalles_movimientos as d, productos as p WHERE m.id=$id AND d.id_movimientos=m.id and d.id_producto = p.id
            ");
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta->execute();
            return $consulta ;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrarAbono(deudasModel $p,$tipo,$id_p){
        try{
            $concepto=$p->getconcepto_abono();
            $valor=$p->getvalor_abono();
            $metodo=$p->getmetodo_abono();
            $fecha=$p->getfecha_abono();
            $consulta="INSERT INTO abonos(
                concepto, 
                valor,
                id_metodo_pago,
                fecha)
            VALUES (?,?,?,?)";
            $pdo = Conexion::conect();
            $execute=$pdo->prepare($consulta);
            $execute->bindParam(1, $concepto, PDO::PARAM_STR);
            $execute->bindParam(2, $valor, PDO::PARAM_STR);
            $execute->bindParam(3, $metodo, PDO::PARAM_INT);
            $execute->bindParam(4, $fecha, PDO::PARAM_STR);
            $execute->execute();
            
            if ($execute) {
                $id_abono = $pdo->lastInsertId();
            }else{
                $lastInsertId = 0;
            }
            $this->calcularAbonos($p->getid_abono(),$id_abono,$p->getvalor_abono(),$tipo,$id_p);
            return 1;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function consultarMov($id_mov){
        try{
            $consulta= Conexion::conect()->prepare("SELECT * FROM movimientos WHERE id=?;");
            $consulta->bindParam(1, $id_mov, PDO::PARAM_INT);
            $consulta->execute();
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            return  $r->total;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function totalAbonos($id_mov){
        try{
            $consulta1="SELECT am.id FROM abono_movimiento as am, abonos as a, movimientos as m WHERE
             m.id=$id_mov AND am.id_movimiento = m.id AND am.id_abono= a.id and am.estado =1";
            $consulta1= Conexion::conect()->prepare($consulta1);
            $consulta1->setFetchMode(PDO::FETCH_ASSOC);
            $consulta1->execute();
            var_dump($consulta1->rowCount());
             if ($consulta1->rowCount() > 0) {
                
                $sql="SELECT SUM(am.monto) as suma FROM abono_movimiento as am, abonos as a, movimientos as
                m WHERE m.id=$id_mov AND am.id_movimiento = m.id AND am.id_abono= a.id";
                $sql = Conexion::conect()->prepare($sql);
                $sql->execute();
                $r=$sql->fetch(PDO::FETCH_OBJ);
    
                return $r->suma;  
            }else{
                return 0;
            }

            
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function PagarDeuda($id_mov){
        try{
            $consult ="UPDATE movimientos SET estado_movimiento='PAGADO' WHERE id=?;";
            $consult = Conexion::conect()->prepare($consult);
            $consulta->bindParam(1, $id_mov, PDO::PARAM_INT);
            $execute = $consult->execute();
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function movAnterior($tipo,$id_p,$id_mov){
        try{
            if ($tipo == 1) {
                $sql="SELECT m.id, MIN(m.fecha) FROM movimientos as m WHERE m.estado=1 AND m.estado_movimiento='A CREDITO' AND m.id_concepto_movimiento = 1 AND m.id_cliente=$id_p and m.id != $id_mov";
            }else{
               $sql="SELECT m.id, MIN(m.fecha) FROM movimientos as m WHERE m.estado=1 AND m.estado_movimiento='A CREDITO' AND m.id_concepto_movimiento != 1 AND m.id_proveedor=$id_p and m.id != $id_mov"; 
            }
            $sql = Conexion::conect()->prepare($sql);
            $sql->execute();
            $r=$sql->fetch(PDO::FETCH_OBJ);
            return $r->id;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function calcularAbonos($id_mov,$idAbono,$montoAbono,$tipo,$id_p){
        
        $totalMov = $this->consultarMov($id_mov);
        $totalAbonos = $this->totalAbonos($id_mov)+$montoAbono;
 
        $result=$totalMov - $totalAbonos;
        var_dump("resultado: ".$result);
        
        if ($result > 0) {
            try{
                var_dump("result > 0 : guardar: ".$montoAbono);
                $consulta="INSERT INTO abono_movimiento(
                    id_movimiento, 
                    id_abono,
                    monto,
                    estado)
                VALUES (?,?,?,?)";
                Conexion::conect()->prepare($consulta)->execute(array(
                    $id_mov,
                    $idAbono,
                    $montoAbono,
                    "1"
                ));
            } catch (Exception $e) {

                die($e->getMessage());
            }
        }elseif ($result == 0) {
            
            var_dump("result = 0 : guardar: ".$totalAbonos);
            $consulta="INSERT INTO abono_movimiento(
                id_movimiento, 
                id_abono,
                monto,
                estado)
            VALUES (?,?,?,?)";
            Conexion::conect()->prepare($consulta)->execute(array(
                $id_mov,
                $idAbono,
                $totalAbonos,
                "1"
            ));
            $this->PagarDeuda($id_mov);

        }elseif($result < 0){
            $total = $totalMov-$this->totalAbonos($id_mov);
            $result = $totalAbonos - $totalMov;
            $consulta="INSERT INTO abono_movimiento(
                id_movimiento, 
                id_abono,
                monto,
                estado)
            VALUES (?,?,?,?)";
            Conexion::conect()->prepare($consulta)->execute(array(
                $id_mov,
                $idAbono,
                $total,
                "1"
            ));
            $this->PagarDeuda($id_mov);
            $idMov = $this->movAnterior($tipo,$id_p,$id_mov);
            try{

                $consulta="INSERT INTO abono_movimiento(
                    id_movimiento, 
                    id_abono,
                    monto,
                    estado)
                VALUES (?,?,?,?)";
                Conexion::conect()->prepare($consulta)->execute(array(
                    $idMov,
                    $idAbono,
                    $result,
                    "1"
                ));
            } catch (Exception $e) {

                die($e->getMessage());
            }
        }
    }
    
    public function eliminar($id){
        try {
            $estado=0;
            $consulta="UPDATE movimientos SET estado=? WHERE id=?;";
            $consulta=Conexion::conect()->prepare($consulta);
            $consulta->bindParam(1, $estado, PDO::PARAM_INT);
            $consulta->bindParam(2, $id, PDO::PARAM_INT);
            $consulta->execute();
            return 1;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function eliminarAbono($id){
        try {   
                $consulta1="SELECT m.id FROM abono_movimiento as am, movimientos as m WHERE am.id_movimiento=m.id and am.id_abono=$id";
                $consulta1= Conexion::conect()->prepare($consulta1);
                $consulta1->setFetchMode(PDO::FETCH_ASSOC);
                $consulta1->execute();
                
                $consulta="DELETE FROM abonos WHERE id=?";
                $execute=Conexion::conect()->prepare($consulta)->execute(array($id));
                
                foreach ($consulta1 as $value) {
                    var_dump($value['id']);
                    $consulta='UPDATE movimientos SET estado_movimiento="A CREDITO" WHERE id=?;';
                    Conexion::conect()->prepare($consulta)->execute(array($value['id']));
                }
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function listarAbonos($id,$tipo){
        try {
            if($tipo == 1){
                $sql= "SELECT a.concepto, a.valor, a.id, a.fecha FROM abonos as a,abono_movimiento as am, movimientos as m WHERE a.id=am.id_abono and am.id_movimiento=m.id and m.id_concepto_movimiento = 1 and m.id_cliente=$id";
            }else{
                $sql= "SELECT a.concepto, a.valor, a.id, a.fecha FROM abonos as a,abono_movimiento as am, movimientos as m WHERE a.id=am.id_abono and am.id_movimiento=m.id and m.id_concepto_movimiento != 1 and m.id_proveedor=$id";
            }

            $consulta= Conexion::conect()->prepare($sql);
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta->execute();
            return $consulta;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
?>