<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;
use content\libraries\core\builder;

class clientesModel extends Conexion{
    private $id;
    private $nombre;
    private $telefono;
    private $tipoDoc;
    private $nroDoc;
    private $comentario;

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

    public function gettelefono(){
        return $this->telefono;
    }

    public function settelefono( $telefono){
        $this->telefono=$telefono;
    }

    public function gettipoDoc(){
        return $this->tipoDoc;
    }

    public function settipoDoc( $tipoDoc){
        $this->tipoDoc=$tipoDoc;
    }

    public function getnroDoc(){
        return $this->nroDoc;
    }

    public function setnroDoc( $nroDoc){
        $this->nroDoc=$nroDoc;
    }

    public function getcomentario(){
        return $this->comentario;
    }

    public function setcomentario( $comentario){
        $this->comentario=$comentario;
    }

    public static function listar(){
        try {
             
                $sql= "SELECT * FROM clientes WHERE estado !=0 ";
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
            $consulta= Conexion::conect()->prepare("SELECT * FROM clientes WHERE id=?;");
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $consulta->execute();
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p= new clientesModel();
            $p->setid($r->id);
            $p->setnombre($r->nombre);
            $p->settelefono($r->telefono);
            $p->settipoDoc($r->tipo_doc);
            $p->setnroDoc($r->nro_doc);
            
            return $p;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function guardar(clientesModel $p){
        try {
            $nombre= $p->getnombre();
            $nro=$p->getnroDoc();
            $tipo=$p->gettipoDoc();
            $tlf=$p->gettelefono();
            $estado = "1";
            $id=$p->getid();
            $consulta="UPDATE clientes SET 
                nombre = :nombre,
                nro_doc = :nro,
                tipo_doc = :tipo,
                telefono = :tlf,
                estado = :estado
                WHERE id = :id;
            ";
            $consulta = Conexion::conect()->prepare($consulta);
            $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR, 50);
            $consulta->bindParam(':nro', $nro, PDO::PARAM_INT);
            $consulta->bindParam(':tipo', $tipo, PDO::PARAM_STR, 50);
            $consulta->bindParam(':tlf', $tlf, PDO::PARAM_INT);
            $consulta->bindParam(':estado', $estado, PDO::PARAM_STR, 5);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
            return 1;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function registrar(clientesModel $p){
        try {
            $documento=$p->getnroDoc();
            if( builder::duplicados("nro_doc","clientes","$documento") === false ){
                return $documento;
            }
            else{
                $nombre= $p->getnombre();
                $nro=$p->getnroDoc();
                $tipo=$p->gettipoDoc();
                $tlf=$p->gettelefono();
                $estado = "1";
                $consulta="INSERT INTO clientes(
                    nombre , 
                    nro_doc,
                    tipo_doc,
                    telefono,
                    estado)
                VALUES (?,?,?,?,?)";
                $consulta = Conexion::conect()->prepare($consulta);
                $consulta->bindParam(1, $nombre, PDO::PARAM_STR, 50);
                $consulta->bindParam(2, $nro, PDO::PARAM_INT);
                $consulta->bindParam(3, $tipo, PDO::PARAM_STR, 50);
                $consulta->bindParam(4, $tlf, PDO::PARAM_INT);
                $consulta->bindParam(5, $estado, PDO::PARAM_STR, 5);
                $consulta->execute();
                return 1;
            }

        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function eliminar($id){
        try {
            $estado=0;
            $consulta="UPDATE clientes SET estado=? WHERE id=?;";
            $consulta=Conexion::conect()->prepare($consulta);
            $consulta->bindParam(2, $id, PDO::PARAM_INT);
            $consulta->bindParam(1, $estado, PDO::PARAM_INT);
            $r=$consulta->execute();
            if($r){
                $consulta1="SELECT m.id FROM movimientos as m, clientes as c WHERE m.id_cliente = c.id and c.id=?";
                $consulta1= Conexion::conect()->prepare($consulta1);
                $consulta->bindParam(1, $id, PDO::PARAM_INT);
                $consulta1->setFetchMode(PDO::FETCH_ASSOC);
                $consulta1->execute();
                if ($consulta1->rowCount() > 0) {
                    foreach ($consulta1 as $row) {
                        $consulta="UPDATE movimientos SET id_cliente=NULL WHERE id=?;";
                        Conexion::conect()->prepare($consulta)->execute(array($row['id']));
                    } 
                }
            }
            return 1;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function buscar($busqueda){
        try {
            $term = "%$busqueda%";
            $estado=1;
            $consulta="SELECT * FROM clientes WHERE estado =:estado AND nombre LIKE :term ";
            $consulta= Conexion::conect()->prepare($consulta);
            $consulta->bindParam(':term', $term, PDO::PARAM_STR);
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