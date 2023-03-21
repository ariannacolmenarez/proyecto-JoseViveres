<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;

class reporteinventarioModel extends Conexion{

    public function __construct(){
        parent::conect();
    }

    public function getInventario(){ 
        $resultado='';
        $sql="SELECT * FROM (SELECT p.id,p.nombre, m.nombre as marca,pp.volumen,pp.unidad_medida,pp.unidades, (SELECT precio_costo FROM ingreso_detalles WHERE id_producto = p.id ORDER BY id DESC LIMIT 1) as precio_costo, (SELECT precio_venta FROM ingreso_detalles WHERE id_producto = p.id ORDER BY id DESC LIMIT 1) as precio_venta, (SELECT SUM(cantidad) FROM ingreso_detalles WHERE id_producto=p.id AND estado !=0 ) as cantidad FROM productos as p, marca_producto as m, presentacion_producto as pp,ingreso_detalles as i,ingreso_productos as ig WHERE p.estado !=0 and p.id=i.id_producto AND i.id_ingreso=ig.id AND p.id_marca=m.id AND p.id_presentacion=pp.id GROUP BY p.id) as productos WHERE cantidad >0";
    try {
        $consulta= Conexion::conect()->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchALL(PDO::FETCH_OBJ);
        return $resultado;
    } catch (Exception $e) {
        return $e->getMessage();
    }
 }
}


?>