<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;
use content\libraries\core\builder;

class categoriasModel extends Conexion{
    private $id;
    private $nombre;

    public function __construct(){
        parent::conect();
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

    public static function listar(){
        try {
            $sql= "SELECT * FROM cat_producto WHERE estado !=0";
            $consulta= Conexion::conect()->prepare($sql);
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta->execute();
            return $consulta;
                
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function consultar($id){
        try {
            $consulta= Conexion::conect()->prepare("SELECT * FROM cat_producto WHERE id= :id ");
            $consulta->bindParam(":id", $id, PDO::PARAM_INT);
            $consulta->execute();
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p= new categoriasModel();
            $p->setid($r->id);
            $p->setnombre($r->categoria);
            
            return $p;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarProdCat($id){
        $sql= "SELECT p.id,p.nombre,p.url_img, m.nombre as marca,pp.volumen,pp.unidad_medida,pp.unidades FROM
         productos as p, marca_producto as m, presentacion_producto as pp WHERE p.estado !=0 and p.id_categoria= :id 
         GROUP BY p.id;";
        $consulta= Conexion::conect()->prepare($sql);
        $consulta->bindParam(":id", $id, PDO::PARAM_INT);
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
        return $consulta;
    }

    public function guardar(categoriasModel $p){
        try {
            
            $consulta="UPDATE cat_producto SET 
                categoria= :cat
                WHERE id= :id;
            ";
            $consulta = Conexion::conect()->prepare($consulta);
            $consulta->bindParam(':cat', $nombre, PDO::PARAM_STR, 50);
            $consulta->bindParam(':id', $estado, PDO::PARAM_STR, 5);
            $consulta->execute();
            return 1;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function registrar(categoriasModel $p){
        try { 
            $categoria=$p->getnombre();
            if(builder::duplicados("categoria","cat_producto","$categoria") === false ){
                return $categoria;
            }
            else{
                $estado="1";
                $nombre=$p->getnombre();
                $consulta="INSERT INTO cat_producto(
                    categoria, estado)
                VALUES (?,?)";
                $consulta = Conexion::conect()->prepare($consulta);
                $consulta->bindParam(1, $nombre, PDO::PARAM_STR, 50);
                $consulta->bindParam(2, $estado, PDO::PARAM_STR, 5);
                $consulta->execute();
                return 1;
            }
            
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function eliminarProd($id){
        try {
            $consulta="UPDATE productos SET id_categoria=NULL WHERE id=?;";
            $consulta = Conexion::conect()->prepare($consulta);
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarCat($id){
        try {
            $consulta="UPDATE cat_producto SET estado=0 WHERE id=?;";
            $consulta = Conexion::conect()->prepare($consulta);
            $r = $consulta->execute(array($id));
            if($r){
                $consulta1="SELECT p.id FROM productos as p, cat_producto as c WHERE p.id_categoria = c.id and c.id=?";
                $consulta1= Conexion::conect()->prepare($consulta1);
                $consulta->bindParam(1, $id, PDO::PARAM_INT);
                $consulta1->setFetchMode(PDO::FETCH_ASSOC);
                $consulta1->execute();
                var_dump($consulta1->rowCount());
                if ($consulta1->rowCount() > 0) {
                    foreach ($consulta1 as $row) {
                        var_dump($row['id']);
                        $consulta="UPDATE productos SET id_categoria=NULL WHERE id=?;";
                        Conexion::conect()->prepare($consulta)->execute(array($row['id']));
                    } 
                    return true;
                }else{
                    return 0;
                }
            }
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscarCat($busqueda){
        try {
            $term = "%$busqueda%";
            $estado="1";
            $consulta="SELECT * FROM cat_producto WHERE estado = :estado AND categoria LIKE :term";
            $consulta= Conexion::conect()->prepare($consulta);
            $consulta->bindParam(':term', $term, PDO::PARAM_STR);
            $consulta->bindParam(':estado', $estado, PDO::PARAM_STR);
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta->execute();
            return $consulta;

        } catch (Exception $e) {

            die($e->getMessage());
        }
    }


}

?>