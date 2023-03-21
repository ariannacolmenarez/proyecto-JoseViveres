<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;
use content\libraries\core\builder;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class productosModel extends Conexion{
    private $id;
    private $nombre;
    private $descripcion;
    private $url_img;
    private $estado;
    private $id_categoria;
    private $id_marca;
    private $id_presentacion;

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

    public function getid_marca(){
        return $this->id_marca;
    }

    public function setid_marca( $id_marca){
        $this->id_marca=$id_marca;
    }

    public function getdescripcion(){
        return $this->descripcion;
    }

    public function setdescripcion( $descripcion){
        $this->descripcion=$descripcion;
    }

    public function getid_presentacion(){
        return $this->id_presentacion;
    }

    public function setid_presentacion( $id_presentacion){
        $this->id_presentacion=$id_presentacion;
    }

    public function geturl_img(){
        return $this->url_img;
    }

    public function seturl_img( $url_img){
        $this->url_img=$url_img;
    }

    public function getestado(){
        return $this->estado;
    }

    public function setestado( $estado){
        $this->estado=$estado;
    }

    public function getid_categoria(){
        return $this->id_categoria;
    }

    public function setid_categoria( $id_categoria){
        $this->id_categoria=$id_categoria;
    }

    public function listarCat(){
        try {
            
            $consulta= Conexion::conect()->prepare("SELECT * FROM cat_producto WHERE estado !=0");
            $consulta->execute();
            return $consulta->fetchALL(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarMarca(){
        try {
            
            $consulta= Conexion::conect()->prepare("SELECT * FROM marca_producto WHERE estado !=0");
            $consulta->execute();
            return $consulta->fetchALL(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarPresentacion(){
        try {
            
            $consulta= Conexion::conect()->prepare("SELECT * FROM presentacion_producto WHERE estado !=0");
            $consulta->execute();
            return $consulta->fetchALL(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar(){
        try {
                $sql= "SELECT p.id,p.nombre,p.url_img, m.nombre as marca,pp.volumen,pp.unidad_medida,pp.unidades FROM productos as p, marca_producto as m, presentacion_producto as pp WHERE p.estado!=0 and p.id_marca=m.id and p.id_presentacion=pp.id GROUP BY p.id;";
                
                $consulta= Conexion::conect()->prepare($sql);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                return $consulta;
                


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar(productosModel $p){
        try {
            $nombre=$p->getnombre();
            if( builder::duplicados("nombre","productos","$nombre") === false ){
                return $nombre;
            }
            else{
                $nombre=$p->getnombre();
                $descripcion=$p->getdescripcion();
                $url=$p->geturl_img();
                $estado="1";
                $cat=$p->getid_categoria();
                $marca=$p->getid_marca();
                $presentacion=$p->getid_presentacion();
                $consulta="INSERT INTO productos(
                    nombre , 
                    descripcion,
                    url_img,
                    estado,
                    id_categoria,
                    id_marca,
                    id_presentacion)
                VALUES (?,?,?,?,?,?,?)";
                $consulta=Conexion::conect()->prepare($consulta);
                $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
                $consulta->bindParam(2, $descripcion, PDO::PARAM_STR);
                $consulta->bindParam(3, $url, PDO::PARAM_STR);
                $consulta->bindParam(4, $estado, PDO::PARAM_STR);
                $consulta->bindParam(5, $cat, PDO::PARAM_INT);
                $consulta->bindParam(6, $marca, PDO::PARAM_INT);
                $consulta->bindParam(7, $presentacion, PDO::PARAM_INT);
                $consulta->execute();
                return 1;
            }
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function consultar($id){
        try {
            $consulta= Conexion::conect()->prepare("SELECT * FROM productos WHERE id=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p= new productosModel();
            $p->seturl_img($r->url_img);
            $p->setnombre($r->nombre);
            $p->setdescripcion($r->descripcion);
            $p->setid_marca($r->id_marca);
            $p->setid_presentacion($r->id_presentacion);
            $p->setid_categoria($r->id_categoria);
            
            return $p;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function guardar(productosModel $p){
        try {
            $nombre=$p->getnombre();
            $descripcion=$p->getdescripcion();
            $url=$p->geturl_img();
            $estado="1";
            $cat=$p->getid_categoria();
            $marca=$p->getid_marca();
            $presentacion=$p->getid_presentacion();
            $id=$p->getid();
            if ($p->geturl_img() == NULL) {
                $consulta="UPDATE productos SET 
                nombre=:nombre , 
                descripcion=:descr,
                estado=:estado,
                id_categoria=:cat,
                id_marca=:marca,
                id_presentacion=:presen
                WHERE id=:id;
            ";
            $consulta=Conexion::conect()->prepare($consulta);
            $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $consulta->bindParam(':descr', $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(':estado', $estado, PDO::PARAM_STR);
            $consulta->bindParam(':cat', $cat, PDO::PARAM_INT);
            $consulta->bindParam(':marca', $marca, PDO::PARAM_INT);
            $consulta->bindParam(':presen', $presentacion, PDO::PARAM_INT);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
            } else {
                $consulta="UPDATE productos SET 
                nombre=:nombre , 
                descripcion=:descr,
                estado=:estado,
                id_categoria=:cat,
                id_marca=:marca,
                id_presentacion=:presen,
                url_img = :urlimg
                WHERE id=?;
            ";
            Conexion::conect()->prepare($consulta);
            $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $consulta->bindParam(':descr', $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(':urlimg', $url, PDO::PARAM_STR);
            $consulta->bindParam(':estado', $estado, PDO::PARAM_STR);
            $consulta->bindParam(':cat', $cat, PDO::PARAM_INT);
            $consulta->bindParam(':marca', $marca, PDO::PARAM_INT);
            $consulta->bindParam(':presen', $presentacion, PDO::PARAM_INT);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
            }
            return 1;

        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function eliminar($id){
        try {
            $estado=0;
            $consulta="UPDATE productos SET estado=? WHERE id=?;";
            $consulta=Conexion::conect()->prepare($consulta);
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $r = $consulta->execute();
            if($r){
                $consulta1="SELECT d.id FROM detalles_movimientos as d, productos as p WHERE d.id_producto = p.id and p.id=$id";
                $consulta1= Conexion::conect()->prepare($consulta1);
                $consulta1->setFetchMode(PDO::FETCH_ASSOC);
                $consulta1->execute();
                if ($consulta1->rowCount() > 0) {
                    foreach ($consulta1 as $row) {
                        $consulta="UPDATE detalles_movimientos SET id_producto=NULL WHERE id=?;";
                        Conexion::conect()->prepare($consulta)->execute(array($row['id']));
                    } 
                    return 0;
                }
                $consulta2="SELECT i.id FROM ingreso_detalles as i, productos as p WHERE i.id_producto = p.id and p.id=$id";
                $consulta2= Conexion::conect()->prepare($consulta2);
                $consulta2->setFetchMode(PDO::FETCH_ASSOC);
                $consulta2->execute();
                if ($consulta2->rowCount() > 0) {
                    foreach ($consulta2 as $row) {
                        $consulta="UPDATE ingreso_detalles SET id_producto=NULL WHERE id=?;";
                        Conexion::conect()->prepare($consulta)->execute(array($row['id']));
                    } 
                    return 0;
                }

            }

        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function totalProd(){
        try {
            $sql = 'SELECT COUNT(p.id) as prod FROM productos as p WHERE p.estado = 1';
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
            $consulta="SELECT p.id,p.nombre,p.url_img, m.nombre as marca,pp.volumen,pp.unidad_medida,pp.unidades FROM productos as p, marca_producto as m, presentacion_producto as pp WHERE p.nombre LIKE :term OR m.nombre LIKE :term2 and p.estado =:estado AND p.id_marca=m.id  GROUP BY p.id";

            $consulta= Conexion::conect()->prepare($consulta);
            $consulta->bindParam(':term', $term, PDO::PARAM_STR);
            $consulta->bindParam(':term2', $term2, PDO::PARAM_STR);  
            $consulta->bindParam(':estado', $estado, PDO::PARAM_INT);
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta->execute();
            return $consulta;

        } catch (Exception $e) {

            die($e->getMessage());
        }
    }


}

?>