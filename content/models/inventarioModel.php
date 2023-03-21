<?php 
namespace content\models;
use content\libraries\core\Conexion;
use PDO;

class inventarioModel extends Conexion {

    public function __construct(){
        parent::conect();
    }

    public function listarCategoriasProd(){
        try {
            
            $consulta= Conexion::conect()->prepare("SELECT * FROM cat_producto WHERE estado !=0");
            $consulta->execute();
            return $consulta->fetchALL(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar($opcion){
        try {
                if ($opcion != "") {
                    $sql= "SELECT * FROM (SELECT p.id,p.nombre,p.url_img, m.nombre as marca,pp.volumen,pp.unidad_medida,pp.unidades, (SELECT precio_venta FROM ingreso_detalles WHERE id_producto = p.id ORDER BY id DESC LIMIT 1) as precio_venta, (SELECT SUM(cantidad) FROM ingreso_detalles WHERE id_producto=p.id AND estado !=0 ) as cantidad FROM productos as p, marca_producto as m, presentacion_producto as pp,ingreso_detalles as i,ingreso_productos as ig WHERE p.estado !=0 and p.id=i.id_producto AND i.id_ingreso=ig.id AND p.id_marca=m.id AND p.id_presentacion=pp.id and p.id_categoria=$opcion GROUP BY p.id) as productos WHERE cantidad >0";
                }else{
                    $sql= "SELECT * FROM (SELECT p.id,p.nombre,p.url_img, m.nombre as marca,pp.volumen,pp.unidad_medida,pp.unidades, (SELECT precio_venta FROM ingreso_detalles WHERE id_producto = p.id ORDER BY id DESC LIMIT 1) as precio_venta, (SELECT SUM(cantidad) FROM ingreso_detalles WHERE id_producto=p.id AND estado !=0 ) as cantidad FROM productos as p, marca_producto as m, presentacion_producto as pp,ingreso_detalles as i,ingreso_productos as ig WHERE p.estado !=0 and p.id=i.id_producto AND i.id_ingreso=ig.id AND p.id_marca=m.id AND p.id_presentacion=pp.id GROUP BY p.id) as productos WHERE cantidad >0";
                }
                $consulta= Conexion::conect()->prepare($sql);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                return $consulta;
                


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function totalProd(){
        try {
            $sql = 'SELECT COUNT(p.id) as prod FROM productos as p, ingreso_detalles as i WHERE p.estado = 1 and p.id=i.id_producto and i.cantidad > 0';
            $consulta= Conexion::conect()->prepare($sql);
            $consulta->execute();
            $r = $consulta->fetch(PDO::FETCH_ASSOC);
            return $r;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscar($busqueda){
        try {
            $term = "%$busqueda%";
            $term2 = "%$busqueda%";
            $estado=1;
            $consulta="SELECT * FROM (SELECT p.id,p.nombre,p.url_img, m.nombre as marca,pp.volumen,pp.unidad_medida,pp.unidades, (SELECT precio_venta FROM ingreso_detalles WHERE id_producto = p.id ORDER BY id DESC LIMIT 1) as precio_venta, (SELECT SUM(cantidad) FROM ingreso_detalles WHERE id_producto=p.id AND estado !=0 ) as cantidad FROM productos as p, marca_producto as m, presentacion_producto as pp,ingreso_detalles as i,ingreso_productos as ig WHERE p.estado !=0 and p.id=i.id_producto AND i.id_ingreso=ig.id AND p.id_marca=m.id AND p.id_presentacion=pp.id GROUP BY p.id) as productos WHERE nombre LIKE :term AND cantidad >0 OR marca LIKE :term2 AND cantidad >0;";

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