<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;
use content\libraries\core\builder;

class marcaModel extends Conexion{
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
            $sql= "SELECT * FROM marca_producto WHERE estado !=0";
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
            $consulta= Conexion::conect()->prepare("SELECT * FROM marca_producto WHERE id=:id;");
            $consulta->bindParam(":id", $id, PDO::PARAM_INT);
            $consulta->execute();
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p= new marcaModel();
            $p->setid($r->id);
            $p->setnombre($r->nombre);
            
            return $p;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function guardar(marcaModel $p){
        try {
            $id= $p->getid();
            $nombre=$p->getnombre();
            $consulta="UPDATE marca_producto SET 
                nombre=:nombre
                WHERE id=:id;
            ";
            $consulta=Conexion::conect()->prepare($consulta);
            $consulta->bindParam(':nombre', $nombre , PDO::PARAM_STR, 50);
            $consulta->bindParam(":id", $id, PDO::PARAM_INT);
            $consulta->execute();
            return 1;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function registrar(marcaModel $p){
        try { 
            $marca=$p->getnombre();
            $estado='1';
            if(builder::duplicados("nombre","marca_producto","$marca") === false ){
                return $marca;
            }
            else{
                $consulta="INSERT INTO marca_producto(
                    nombre, estado)
                VALUES (?,?)";
                $consulta=Conexion::conect()->prepare($consulta);
                $consulta->bindParam(1, $marca , PDO::PARAM_STR, 50);
                $consulta->bindParam(2, $estado, PDO::PARAM_INT);
                $consulta->execute();
                return 1;
            }
            
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function eliminarMarca($id){
        try {
            $consulta="UPDATE marca_producto SET estado=0 WHERE id=?;";
            $consulta = Conexion::conect()->prepare($consulta);
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $r = $consulta->execute();
            if($r){
                $consulta1="SELECT p.id FROM productos as p, marca_producto as m WHERE p.id_marca = m.id and m.id=$id";
                $consulta1= Conexion::conect()->prepare($consulta1);
                $consulta1->setFetchMode(PDO::FETCH_ASSOC);
                $consulta1->execute();
                if ($consulta1->rowCount() > 0) {
                    foreach ($consulta1 as $row) {
                        $consulta="UPDATE productos SET id_marca=NULL WHERE id=?;";
                        Conexion::conect()->prepare($consulta)->execute(array($row['id']));
                    } 
                    return 1;
                }else{
                    return 0;
                }
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscarMarca($busqueda){
        try {

            $consulta="SELECT * FROM marca_producto WHERE estado =? AND nombre LIKE '%$busqueda%'";

            $consulta= Conexion::conect()->prepare($consulta);
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta->execute(array("1"));
            return $consulta;

        } catch (Exception $e) {

            die($e->getMessage());
        }
    }


}

?>