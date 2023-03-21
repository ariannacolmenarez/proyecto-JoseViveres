<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class gastosModel extends Conexion{
    private $id;
    private $nombre;
    private $monto;
    private $fecha;
    private $hora;
    private $concepto;
    private $estado_movimiento;
    private $id_metodo_pago;
    private $id_deuda;
    private $id_persona;
    

    public function __construct(){
        parent::conect();
    }

    public function getid(){
        return $this->id;
    }

    public function setid( $id){
        $this->id=$id;
    }

    public function gethora(){
        return $this->hora;
    }

    public function sethora( $hora){
        $this->hora=$hora;
    }

    public function getconcepto(){
        return $this->concepto;
    }

    public function setconcepto( $concepto){
        $this->concepto=$concepto;
    }


    public function getnombre(){
        return $this->nombre;
    }

    public function setnombre( $nombre){
        $this->nombre=$nombre;
    }

    public function getmonto(){
        return $this->monto;
    }

    public function setmonto( $monto){
        $this->monto=$monto;
    }

    public function getfecha(){
        return $this->fecha;
    }

    public function setfecha( $fecha){
        $this->fecha=$fecha;
    }

    public function getestado_movimiento(){
        return $this->estado_movimiento;
    }

    public function setestado_movimiento( $estado_movimiento){
        $this->estado_movimiento=$estado_movimiento;
    }

    public function getid_metodo_pago(){
        return $this->id_metodo_pago;
    }

    public function setid_metodo_pago( $id_metodo_pago){
        $this->id_metodo_pago=$id_metodo_pago;
    }

    public function getid_deuda(){
        return $this->id_deuda;
    }

    public function setid_deuda( $id_deuda){
        $this->id_deuda=$id_deuda;
    }

    public function getid_persona(){
        return $this->id_persona;
    }

    public function setid_persona( $id_persona){
        $this->id_persona=$id_persona;
    }

    // public function listar(){
    //     try {
             
    //             $sql= "SELECT * FROM cat_operacion WHERE estado !=0";
    //             $consulta= Conexion::conect()->prepare($sql);
    //             $consulta->setFetchMode(PDO::FETCH_ASSOC);
    //             $consulta->execute();
    //             return $consulta;
                
    //     } catch (Exception $e) {
    //         die($e->getMessage());
    //     }
    // }

    public function listarCategorias(){
        try {
            $consulta= Conexion::conect()->prepare("SELECT * FROM concepto_movimiento WHERE estado !=0 AND categoria != 'VENTA'");
            $consulta->execute();
            return $consulta->fetchALL(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarProveedores(){
        try {
            $consulta= Conexion::conect()->prepare("SELECT * FROM proveedores WHERE estado !=0 ");
            $consulta->execute();
            return $consulta->fetchALL(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(gastosModel $p){
        try {
            $nombre=$p->getnombre();
            $total=$p->getmonto();
            $fecha=$p->getfecha();
            $hora=$p->gethora();
            $estado=$p->getestado_movimiento();
            $concepto=$p->getconcepto();
            $metodo=$p->getid_metodo_pago();
            $proveedor=$p->getid_persona();
            $usuario=$_SESSION['id_usuario'];
            $e=1;
            $consulta="INSERT INTO movimientos(
                nombre , 
                total,
                fecha,
                hora,
                estado_movimiento,
                estado,
                id_concepto_movimiento,
                id_metodo_pago,
                id_proveedor,
                id_usuario)
            VALUES (?,?,?,?,?,?,?,?,?,?)";
            
            $consulta=Conexion::conect()->prepare($consulta);
            $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
            $consulta->bindParam(2, $total, PDO::PARAM_STR);
            $consulta->bindParam(3, $fecha, PDO::PARAM_STR);
            $consulta->bindParam(4, $hora, PDO::PARAM_STR);
            $consulta->bindParam(5, $estado, PDO::PARAM_INT);
            $consulta->bindParam(6, $e, PDO::PARAM_INT);
            $consulta->bindParam(7, $concepto, PDO::PARAM_INT);
            $consulta->bindParam(8, $metodo, PDO::PARAM_INT);
            $consulta->bindParam(9, $proveedor, PDO::PARAM_INT);
            $consulta->bindParam(10, $usuario, PDO::PARAM_INT);
            $consulta->execute();
            return 1;

        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function eliminar($id){
        try {
            $estado=0;
            $consulta="UPDATE movimientos SET estado=? WHERE id=?;";
            $consulta = Conexion::conect()->prepare($consulta);
            $consulta->bindParam(1, $estado, PDO::PARAM_INT);
            $consulta->bindParam(2, $id, PDO::PARAM_INT);
            $consulta->execute();

            $consulta1="SELECT d.id FROM detalles_movimientos as d, movimientos as m WHERE d.id_movimientos = m.id and m.id=$id";
            $consulta1= Conexion::conect()->prepare($consulta1);
            $consulta1->setFetchMode(PDO::FETCH_ASSOC);
            $consulta1->execute();
            if ($consulta1->rowCount() > 0) {
                foreach ($consulta1 as $row) {
                    $consulta="UPDATE detalles_movimientos SET id_movimientos=NULL WHERE id=?;";
                    Conexion::conect()->prepare($consulta)->execute(array($row['id']));
                } 
            }
            return 1;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

}

?>