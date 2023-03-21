<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;

class presentacionModel extends Conexion{
    private $id;
    private $volumen;
    private $unidades;
    private $medidas;

    public function __construct(){
        parent::conect();
    }

    public function getid(){
        return $this->id;
    }

    public function setid( $id){
        $this->id=$id;
    }

    public function getmedidas(){
        return $this->medidas;
    }

    public function setmedidas( $medidas){
        $this->medidas=$medidas;
    }

    public function getunidades(){
        return $this->unidades;
    }

    public function setunidades( $unidades){
        $this->unidades=$unidades;
    }

    public function getvolumen(){
        return $this->volumen;
    }

    public function setvolumen( $volumen){
        $this->volumen=$volumen;
    }

    public static function listar(){
        try {
            $sql= "SELECT * FROM presentacion_producto WHERE estado !=0";
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
            $consulta= Conexion::conect()->prepare("SELECT * FROM presentacion_producto WHERE id=?;");
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $consulta->execute();
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p= new presentacionModel();
            $p->setid($r->id);
            $p->setvolumen($r->volumen);
            $p->setmedidas($r->unidad_medida);
            $p->setunidades($r->unidades);
            
            return $p;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function guardar(presentacionModel $p){
        try {
            $volumen=$p->getvolumen();
            $unidad=$p->getmedidas();
            $unidades=$p->getunidades();
            $id=$p->getid();
            $consulta="UPDATE presentacion_producto SET 
                volumen=:volumen,
                unidad_medida=:unidad,
                unidades=:unidades
                WHERE id=:id;
            ";
            $consulta=Conexion::conect()->prepare($consulta);
            $consulta->bindParam(':volumen', $volumen , PDO::PARAM_STR);
            $consulta->bindParam(':unidad', $unidad, PDO::PARAM_STR);
            $consulta->bindParam(':unidades', $unidades , PDO::PARAM_STR);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
            return 1;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function registrar(presentacionModel $p){
        try {   
                $volumen=$p->getvolumen();
                $unidad=$p->getmedidas();
                $unidades=$p->getunidades();
                $estado="1";
                $consulta="INSERT INTO presentacion_producto(
                    volumen,unidad_medida,unidades, estado)
                VALUES (?,?,?,?)";
                $consulta=Conexion::conect()->prepare($consulta);
                $consulta->bindParam(1, $volumen , PDO::PARAM_STR);
                $consulta->bindParam(2, $unidad, PDO::PARAM_STR);
                $consulta->bindParam(3, $unidades , PDO::PARAM_STR);
                $consulta->bindParam(4, $estado, PDO::PARAM_STR);
                $consulta->execute();
                return 1;
            
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function eliminarPresentacion($id){
        try {
            $consulta="UPDATE presentacion_producto SET estado=0 WHERE id=?;";
            $consulta = Conexion::conect()->prepare($consulta);
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $r = $consulta->execute();
            if($r){
                $consulta1="SELECT p.id FROM productos as p, presentacion_producto as pp WHERE p.id_presentacion = pp.id and pp.id=$id";
                $consulta1= Conexion::conect()->prepare($consulta1);
                $consulta1->setFetchMode(PDO::FETCH_ASSOC);
                $consulta1->execute();
                if ($consulta1->rowCount() > 0) {
                    foreach ($consulta1 as $row) {
                        $consulta="UPDATE productos SET id_presentacion=NULL WHERE id=?;";
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

}

?>