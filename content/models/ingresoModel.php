<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;
use content\libraries\core\builder;

class ingresoModel extends Conexion{
    private $id;
    private $fecha;
    private $nro_factura;
    private $proveedor;
    private $total_factura;
    private $estado_factura;
    private $fecha_factura;
    private $id_producto;
    private $productos;
    private $precio_costo;
    private $precio_venta;
    private $cantidad;
    private $metodo_factura;

    public function __construct(){
        parent::conect();
    }

    public function getid(){
        return $this->id;
    }

    public function setid( $id){
        $this->id=$id;
    }

    public function getmetodo_factura(){
        return $this->metodo_factura;
    }

    public function setmetodo_factura( $metodo_factura){
        $this->metodo_factura=$metodo_factura;
    }


    public function getid_producto(){
        return $this->id_producto;
    }

    public function setid_producto( $id_producto){
        $this->id_producto=$id_producto;
    }

    public function getproductos(){
        return $this->productos;
    }

    public function setproductos( $productos){
        $this->productos=$productos;
    }

    public function getprecio_costo(){
        return $this->precio_costo;
    }

    public function setprecio_costo( $precio_costo){
        $this->precio_costo=$precio_costo;
    }

    public function getprecio_venta(){
        return $this->precio_venta;
    }

    public function setprecio_venta( $precio_venta){
        $this->precio_venta=$precio_venta;
    }

    public function getcantidad(){
        return $this->cantidad;
    }

    public function setcantidad( $cantidad){
        $this->cantidad=$cantidad;
    }

    public function getfecha(){
        return $this->fecha;
    }

    public function setfecha( $fecha){
        $this->fecha=$fecha;
    }

    public function getfecha_factura(){
        return $this->fecha_factura;
    }

    public function setfecha_factura( $fecha_factura){
        $this->fecha_factura=$fecha_factura;
    }

    public function getestado_factura(){
        return $this->estado_factura;
    }

    public function setestado_factura( $estado_factura){
        $this->estado_factura=$estado_factura;
    }

    public function gettotal_factura(){
        return $this->total_factura;
    }

    public function settotal_factura( $total_factura){
        $this->total_factura=$total_factura;
    }
    
    public function getproveedor(){
        return $this->proveedor;
    }

    public function setproveedor( $proveedor){
        $this->proveedor=$proveedor;
    }

    public function getnro_factura(){
        return $this->nro_factura;
    }

    public function setnro_factura( $nro_factura){
        $this->nro_factura=$nro_factura;
    }

    public static function listarIngreso(){
        try {
             
                $sql= "SELECT i.id,i.fecha,i.nro_factura,i.total_factura,p.nombre FROM ingreso_productos as i , proveedores as p , ingreso_detalles as d WHERE i.estado !=0 and i.id_proveedor=p.id and i.id=d.id_ingreso and d.estado !=2";
                $consulta= Conexion::conect()->prepare($sql);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                return $consulta;
                
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarProductos(){
        try {
                $sql= "SELECT p.id,p.nombre, m.nombre as marca,pp.volumen,pp.unidad_medida,pp.unidades FROM productos as p, marca_producto as m, presentacion_producto as pp WHERE p.estado!=0 and p.id_marca=m.id and p.id_presentacion=pp.id GROUP BY p.id;";
                
                $consulta= Conexion::conect()->prepare($sql);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                return $consulta;
                
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarProveedores(){
        try {
                $sql= "SELECT* FROM proveedores WHERE estado!=0 ";
                
                $consulta= Conexion::conect()->prepare($sql);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                return $consulta;
                


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(ingresoModel $p){
        try {    
            $count=0;        
            foreach ($p->getid_producto() as $row) {
                $count += $row['costo']*$row['cantidad'];
            }
            $documento=$p->getnro_factura();
            if( builder::duplicados("nro_factura","ingreso_productos","$documento") === false ){
                return $documento;
            }
            else{
                $pdo=Conexion::conect();
                $fecha=$p->getfecha();
                $nro=$p->getnro_factura();
                $fecha_fac=$p->getfecha_factura();
                $estado_fac=$p->getestado_factura();
                $total=$count;
                $proveedor=$p->getproveedor();
                $metodo=$p->getmetodo_factura();
                $estado="1";
                    $consulta="INSERT INTO ingreso_productos( 
                        fecha,
                        nro_factura,
                        fecha_factura,
                        estado_factura,
                        total_factura,
                        id_proveedor,
                        id_metodo_pago,
                        estado)
                    VALUES (?,?,?,?,?,?,?,?)";
                    $consulta =$pdo->prepare($consulta);
                    $consulta->bindParam(1, $fecha, PDO::PARAM_STR);
                    $consulta->bindParam(2, $nro, PDO::PARAM_INT);
                    $consulta->bindParam(3, $fecha_fac, PDO::PARAM_STR);
                    $consulta->bindParam(4, $estado_fac, PDO::PARAM_INT);
                    $consulta->bindParam(5, $total, PDO::PARAM_STR);
                    $consulta->bindParam(6, $proveedor, PDO::PARAM_INT);
                    $consulta->bindParam(7, $metodo, PDO::PARAM_INT);
                    $consulta->bindParam(8, $estado, PDO::PARAM_STR);
                    $execute = $consulta->execute();
                if ($execute) {
                    $lastInsertId = $pdo->lastInsertId();
                
                    foreach ($p->getid_producto() as $row) {
                        
                        $stmt = Conexion::conect()->prepare('INSERT INTO ingreso_detalles
                        (precio_venta,precio_costo, cantidad, id_producto, estado, id_ingreso)
                        VALUES(:precio_venta,:precio_costo, :cantidad,:id_producto, :estado, :id_ingreso);
                        ');
                    
                        $stmt->execute([':precio_venta' => $row['venta'],
                                        ':precio_costo' => $row['costo'],
                                        ':cantidad' => $row['cantidad'],
                                        ':id_producto' => $row['id'],
                                        ':estado' => 1,
                                        ':id_ingreso' => $lastInsertId
                                        ]);
                    }
                    ini_set('date.timezone','America/Caracas');
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
                    Conexion::conect()->prepare($consulta)->execute(array(
                        "compra de productos",
                        $count,
                        $p->getfecha(),
                        date("H:i"),
                        $p->getestado_factura(),
                        "1",
                        "3",
                        $p->getmetodo_factura(),
                        $p->getproveedor(),
                        $_SESSION['id_usuario']
                        // 1
                    ));
                }
                return 1;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function consultarIngreso($id){
        try {
            $consulta= Conexion::conect()->prepare("SELECT i.id,i.fecha,i.nro_factura,i.fecha_factura,i.estado_factura,i.total_factura,p.nombre FROM ingreso_productos as i, proveedores as p WHERE i.id=? and i.id_proveedor=p.id;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p= new ingresoModel();
            $p->setid($id);
            $p->setfecha($r->fecha);
            $p->setnro_factura($r->nro_factura);
            $p->setfecha_factura($r->fecha_factura);
            $p->settotal_factura($r->total_factura);
            $p->setestado_factura($r->estado_factura);
            $p->setproveedor($r->nombre);
            
            return $p;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerproductosI($id){
        try {
            $consulta= Conexion::conect()->prepare("SELECT p.id,p.nombre, i.precio_venta,i.precio_costo,i.cantidad,(SELECT GROUP_CONCAT(p.nombre ,' ',m.nombre,' ',pp.volumen,pp.unidad_medida,' * ',pp.unidades) AS producto FROM productos as p , marca_producto as m , presentacion_producto as pp WHERE p.id=i.id_producto AND p.id_marca=m.id and p.id_presentacion=pp.id) as productos FROM productos as p, ingreso_detalles as i, ingreso_productos as ig WHERE p.id=i.id_producto and i.id_ingreso= ig.id and ig.id=$id and i.estado!=2;");
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta->execute();
            return $consulta;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
 
    public function eliminarIngreso($id){
        try {
            
            $consulta="DELETE FROM `ingreso_productos` WHERE id=?;";
            $consulta=Conexion::conect()->prepare($consulta);
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $consulta->execute(); 
            return 1;        
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
?>