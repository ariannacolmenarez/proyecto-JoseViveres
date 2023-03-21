<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;

class ventasModel extends Conexion{
    private $id_prod;
    private $nombre_prod;
    private $cantidad_prod;
    private $descripcion_prod;
    private $precio_costo_prod;
    private $precio_venta_prod;
    private $url_prod;
    private $estado_prod;
    private $categoria_prod ;
    private $id;
    private $nombre;
    private $total;
    private $fecha;
    private $hora;
    private $estado_movimiento;
    private $id_metodo_pago;
    private $id_deuda;
    private $id_persona;
    private $productos;
    private $clientes;
    

    public function __construct(){
        parent::conect();
    }

    public function getid_prod(){
        return $this->id_prod;
    }

    public function setid_prod( $id_prod){
        $this->id_prod=$id_prod;
    }

    public function getclientes(){
        return $this->clientes;
    }

    public function setclientes( $clientes){
        $this->clientes=$clientes;
    }

    public function getproductos(){
        return $this->productos;
    }

    public function setproductos( $productos){
        $this->productos=$productos;
    }

    public function getnombre_prod(){
        return $this->nombre_prod;
    }

    public function setnombre_prod( $nombre_prod){
        $this->nombre_prod=$nombre_prod;
    }

    public function getcantidad_prod(){
        return $this->cantidad_prod;
    }

    public function setcantidad_prod( $cantidad_prod){
        $this->cantidad_prod=$cantidad_prod;
    }

    public function getdescripcion_prod(){
        return $this->descripcion_prod;
    }

    public function setdescripcion_prod( $descripcion_prod){
        $this->descripcion_prod=$descripcion_prod;
    }

    public function getprecio_costo_prod(){
        return $this->precio_costo_prod;
    }

    public function setprecio_costo_prod( $precio_costo_prod){
        $this->precio_costo_prod=$precio_costo_prod;
    }

    public function getprecio_venta_prod(){
        return $this->precio_venta_prod;
    }

    public function setprecio_venta_prod( $precio_venta_prod){
        $this->precio_venta_prod=$precio_venta_prod;
    }

    public function geturl_prod(){
        return $this->url_prod;
    }

    public function seturl_prod( $url_prod){
        $this->url_prod=$url_prod;
    }

    public function getestado_prod(){
        return $this->estado_prod;
    }

    public function setestado_prod( $estado_prod){
        $this->estado_prod=$estado_prod;
    }

    public function getcategoria_prod(){
        return $this->categoria_prod;
    }

    public function setcategoria_prod( $categoria_prod){
        $this->categoria_prod=$categoria_prod;
    }

    public function getid(){
        return $this->id;
    }

    public function setid( $id){
        $this->id=$id;
    }

    public function getnombre(){
        return $this->nombre;
    }

    public function setnombre( $nombre){
        $this->nombre=$nombre;
    }

    public function gettotal(){
        return $this->total;
    }

    public function settotal( $total){
        $this->total=$total;
    }

    public function getfecha(){
        return $this->fecha;
    }

    public function setfecha( $fecha){
        $this->fecha=$fecha;
    }

    public function gethora(){
        return $this->hora;
    }

    public function sethora( $hora){
        $this->hora=$hora;
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

    public function listar($opcion){
        try {
                if ($opcion != "") {
                    $sql= "SELECT p.id,p.nombre,p.url_img, m.nombre as marca,pp.volumen,pp.unidad_medida,pp.unidades, (SELECT precio_venta FROM ingreso_detalles WHERE id_producto = p.id ORDER BY id DESC LIMIT 1) as precio_venta, (SELECT SUM(cantidad) FROM ingreso_detalles WHERE id_producto=p.id AND estado !=0 ) as cantidad FROM productos as p, marca_producto as m, presentacion_producto as pp,ingreso_detalles as i,ingreso_productos as ig WHERE p.estado !=0 and p.id=i.id_producto AND i.id_ingreso=ig.id AND p.id_marca=m.id AND p.id_presentacion=pp.id and p.id_categoria=$opcion GROUP BY p.id";
                }else{
                    $sql= "SELECT p.id,p.nombre,p.url_img, m.nombre as marca,pp.volumen,pp.unidad_medida,pp.unidades, (SELECT precio_venta FROM ingreso_detalles WHERE id_producto = p.id ORDER BY id DESC LIMIT 1) as precio_venta, (SELECT SUM(cantidad) FROM ingreso_detalles WHERE id_producto=p.id AND estado !=0 ) as cantidad FROM productos as p, marca_producto as m, presentacion_producto as pp,ingreso_detalles as i,ingreso_productos as ig WHERE p.estado !=0 and p.id=i.id_producto AND i.id_ingreso=ig.id AND p.id_marca=m.id AND p.id_presentacion=pp.id GROUP BY p.id";
                }
                $consulta= Conexion::conect()->prepare($sql);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                return $consulta;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarClientes(){
        try {

            $consulta= Conexion::conect()->prepare("SELECT * FROM clientes WHERE estado !=0 ");
            $consulta->execute();
            return $consulta->fetchALL(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarCategorias(){
        try {
            
            $consulta= Conexion::conect()->prepare("SELECT * FROM cat_producto WHERE estado !=0");
            $consulta->execute();
            return $consulta->fetchALL(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function consultarprod($id){
        try {
            $consulta= Conexion::conect()->prepare("SELECT p.id,p.nombre,p.url_img, m.nombre as marca,pp.volumen,pp.unidad_medida,pp.unidades, (SELECT precio_venta FROM ingreso_detalles WHERE id_producto = p.id ORDER BY id DESC LIMIT 1) as precio_venta, (SELECT SUM(cantidad) FROM ingreso_detalles WHERE id_producto=p.id AND estado !=0 ) as cantidad FROM productos as p, marca_producto as m, presentacion_producto as pp,ingreso_detalles as i,ingreso_productos as ig WHERE p.estado !=0 and p.id=i.id_producto AND i.id_ingreso=ig.id AND p.id_marca=m.id AND p.id_presentacion=pp.id and p.id=?");
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $consulta->execute();
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p= new ventasModel();
            $p->setid_prod($r->id);
            $p->setnombre_prod($r->nombre);
            $p->setcantidad_prod($r->cantidad);
            $p->setprecio_venta_prod($r->precio_venta);
            return $p;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($id){
        try {
            $estado=0;
            $consulta= Conexion::conect()->prepare("SELECT id.id, id.cantidad as stock, d.cantidad FROM detalles_movimientos as d, productos as p, movimientos as m, ingreso_productos as i,ingreso_detalles as id WHERE m.id ='114' AND d.id_movimientos=m.id AND d.id_producto=p.id AND i.id=id.id_ingreso and id.id_producto=p.id AND id.id = (SELECT id FROM ingreso_detalles WHERE id_producto = p.id AND cantidad > 0 ORDER BY id DESC LIMIT 1)");
            $consulta->execute();
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $producto = $r->id;
            $stock = $r->stock;
            $cantidad = $r->cantidad;
            $cantidadTotal= $stock + $cantidad;

            $consulta="UPDATE movimientos SET estado=? WHERE id=?;";
            Conexion::conect()->prepare($consulta)->execute(array($estado,$id));
            $consulta="UPDATE ingreso_detalles SET cantidad=? WHERE id=?;";
            Conexion::conect()->prepare($consulta)->execute(array($cantidadTotal,$producto));

            $consulta1="SELECT d.id FROM detalles_movimientos as d, movimientos as m WHERE d.id_movimientos = m.id and m.id=$id";
            $consulta1= Conexion::conect()->prepare($consulta1);
            $consulta1->setFetchMode(PDO::FETCH_ASSOC);
            $consulta1->execute();
            if ($consulta1->rowCount() > 0) {
                foreach ($consulta1 as $row) {
                    $consulta="UPDATE detalles_movimientos SET estado=0 WHERE id=?;";
                    Conexion::conect()->prepare($consulta)->execute(array($row['id']));
                } 
            }
            return 1;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function ingresoAnterior($id){
        try{
            $sql="SELECT d.id,d.cantidad FROM ingreso_productos as i,ingreso_detalles as d,productos as p WHERE i.estado=1 and d.id = (SELECT id FROM ingreso_detalles WHERE id_producto = p.id AND cantidad > 0 ORDER BY id ASC LIMIT 1) and p.id=$id GROUP BY d.id"; 
            $sql = Conexion::conect()->prepare($sql);
            $sql->execute();
            $r=$sql->fetch(PDO::FETCH_OBJ);
            return $r;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(ventasModel $p){
        try {
            $nombre=$p->getnombre();
            $total=$p->getmonto();
            $fecha=$p->getfecha();
            $hora=$p->gethora();
            $estado=$p->getestado_movimiento();
            $concepto=$p->getconcepto();
            $metodo=$p->getid_metodo_pago();
            $cliente=$p->getid_persona();
            $usuario=$_SESSION['id_usuario'];
            $e=1;          
            $pdo=Conexion::conect();
                $consulta="INSERT INTO movimientos(
                    total ,
                    nombre,
                    fecha,
                    hora,
                    estado_movimiento,
                    estado,
                    id_concepto_movimiento,
                    id_metodo_pago,
                    id_cliente,
                    id_usuario)
                VALUES (?,?,?,?,?,?,?,?,?,?)";
                $consulta =$pdo->prepare($consulta);
                $consulta->bindParam(2, $nombre, PDO::PARAM_STR);
                $consulta->bindParam(1, $total, PDO::PARAM_STR);
                $consulta->bindParam(3, $fecha, PDO::PARAM_STR);
                $consulta->bindParam(4, $hora, PDO::PARAM_STR);
                $consulta->bindParam(5, $estado, PDO::PARAM_INT);
                $consulta->bindParam(6, $e, PDO::PARAM_INT);
                $consulta->bindParam(7, $concepto, PDO::PARAM_INT);
                $consulta->bindParam(8, $metodo, PDO::PARAM_INT);
                $consulta->bindParam(9, $cliente, PDO::PARAM_INT);
                $consulta->bindParam(10, $usuario, PDO::PARAM_INT);
                $execute = $consulta->execute();
                
                if ($execute) {
                    $lastInsertId = $pdo->lastInsertId();
                }else{
                    $lastInsertId = 0;
                    echo $consulta->errorInfo()[2];
                }
                
                foreach ($p->getproductos() as $row) {
                
                    $precio = $row['value']['precio_venta'];
                    $cantidad = $row['value']['agregado'];
                    $estado = 1;
                    $id_mov = $lastInsertId;
                    $id_producto = $row['value']['id'];
                    $cantidadProd = $row['value']['cantidad'];
                    
                    
                    $stmt = Conexion::conect()->prepare('INSERT INTO detalles_movimientos(precio, cantidad, estado,id_movimientos, id_producto)
                                            VALUES(:precio, :cantidad, :estado, :id_movimiento, :id_producto);
                                        ');
                
                    $stmt->execute([':precio' => $precio,
                                    ':cantidad' => $cantidad,
                                    ':estado' => $estado,
                                    ':id_movimiento' => $id_mov,
                                    ':id_producto' => $id_producto
                                    ]);
                    $i=0;        
                    while ($cantidad > 0) {
                        $ingreso="ingreso".$i;
                        $i++;
                        $ingreso=$this->ingresoAnterior($id_producto);
                        if ($cantidad <= $ingreso->cantidad) {
                            $totalDesc = $ingreso->cantidad - $cantidad;
                            $consulta="UPDATE ingreso_detalles SET 
                            cantidad=?,
                            estado=?
                            WHERE id=?;";
                            Conexion::conect()->prepare($consulta)->execute(array(
                                $totalDesc,
                                2,
                                $ingreso->id
                            ));
                            $cantidad=0;
                            var_dump($ingreso->cantidad);
                            var_dump($cantidad);
                            var_dump($ingreso->id);
                        }else {
                            $cantidad = $cantidad - $ingreso->cantidad;
                            $consulta="UPDATE ingreso_detalles SET 
                            cantidad=?,
                            estado=?
                            WHERE id=?;";
                            Conexion::conect()->prepare($consulta)->execute(array(
                                0,
                                2,
                                $ingreso->id
                            ));
                            // var_dump($ingreso->cantidad);
                            // var_dump($cantidad);
                            // var_dump($ingreso->id);
                        }
                    }

                    // if ($cantidad <= $ingreso->cantidad) {
                    //     $totalDesc = $ingreso->cantidad - $cantidad;
                    //     $consulta="UPDATE ingreso_detalles SET 
                    //     cantidad=?,
                    //     estado=?
                    //     WHERE id=?;";
                    //     Conexion::conect()->prepare($consulta)->execute(array(
                    //         $totalDesc,
                    //         2,
                    //         $ingreso->id
                    //     ));
                    // }else {
                        
                    //     $totalDesc = $cantidad - $ingreso->cantidad;
                    //     $i=0;
                    //      do{
                    //         $ing="ingreso".$i;
                    //         $i++;
                    //         var_dump($ing);
                    //         $ing=$this->ingresoAnterior($id_producto);
                    //         $consulta="UPDATE ingreso_detalles SET 
                    //         cantidad=?,
                    //         estado=?
                    //         WHERE id=?;";
                    //         if ($totalDesc >= $ing->cantidad) {
                    //             $totalDesc= $totalDesc - $ing->cantidad;
                    //            Conexion::conect()->prepare($consulta)->execute(array(
                    //                 0,
                    //                 2,
                    //                 $ing->id
                    //             )); 
                    //         }else{
                    //             $totalDesc= $ing->cantidad - $totalDesc;
                    //             Conexion::conect()->prepare($consulta)->execute(array(
                    //                 $totalDesc,
                    //                 2,
                    //                 $ing->id
                    //             ));
                    //         }
                    //         var_dump($ing->cantidad);
                    //         var_dump($totalDesc);
                    //         var_dump($ing->id);
                    //         var_dump("&&&&");
                    //     }while ($totalDesc >= $ing->cantidad);
                        
                    //     $ing=$this->ingresoAnterior($id_producto);
                    //     $consulta="UPDATE ingreso_detalles SET 
                    //     cantidad=?,
                    //     estado=?
                    //     WHERE id=?;";
                    //     $total= ($ing->cantidad - $totalDesc)-1;
                    //     Conexion::conect()->prepare($consulta)->execute(array(
                    //         $total,
                    //         2,
                    //         $ing->id
                    //     ));
                    //     var_dump($total);
                    // }
                }
                return 1;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscar($busqueda){
        try {
            $term = "%$busqueda%";
            $term2 = "%$busqueda%";
            $consulta="SELECT * FROM (SELECT p.id,p.nombre,p.url_img, m.nombre as marca,pp.volumen,pp.unidad_medida,pp.unidades, (SELECT precio_venta FROM ingreso_detalles WHERE id_producto = p.id ORDER BY id DESC LIMIT 1) as precio_venta, (SELECT SUM(cantidad) FROM ingreso_detalles WHERE id_producto=p.id AND estado !=0 ) as cantidad FROM productos as p, marca_producto as m, presentacion_producto as pp,ingreso_detalles as i,ingreso_productos as ig WHERE p.estado !=0 and p.id=i.id_producto AND i.id_ingreso=ig.id AND p.id_marca=m.id AND p.id_presentacion=pp.id GROUP BY p.id) as productos WHERE nombre LIKE :term OR marca LIKE :term2;";

            $consulta= Conexion::conect()->prepare($consulta);
            $consulta->bindParam(':term', $term, PDO::PARAM_STR);
            $consulta->bindParam(':term2', $term2, PDO::PARAM_STR);
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta->execute();
            return $consulta;

        } catch (Exception $e) {

            die($e->getMessage());
        }
    }


}

?>