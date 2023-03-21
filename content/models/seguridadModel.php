<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;
use content\libraries\core\builder;

class seguridadModel extends Conexion{
    private $idRol;
    private $nombreRol;
    private $descripcionRol;

    public function __construct(){
        parent::conect();
    }

    public function getidRol(){
        return $this->idRol;
    }

    public function setidRol( $idRol){
        $this->idRol=$idRol;
    }

    public function getnombreRol(){
        return $this->nombreRol;
    }

    public function setnombreRol( $nombreRol){
        $this->nombreRol=$nombreRol;
    }

    public function getdescripcionRol(){
        return $this->descripcionRol;
    }

    public function setdescripcionRol( $descripcionRol){
        $this->descripcionRol=$descripcionRol;
    }

    public static function listarRoles(){
        try {
             
                $sql= "SELECT * FROM rol WHERE estado !=0";
                $consulta= Conexion::conect()->prepare($sql);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                return $consulta;
                
                
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrarRol(seguridadModel $p){
        try {
            $nombre=$p->getnombreRol();
            if( builder::duplicados("nombre","rol","$nombre") === false ){
                return $nombre;
            }
            else{
                $nombre=$p->getnombreRol();
                $descripcion=$p->getdescripcionRol();
                $estado="1";
                $consulta="INSERT INTO rol(
                    nombre , 
                    descripcion,
                    estado)
                VALUES (?,?,?)";
                $consulta=Conexion::conect()->prepare($consulta);
                $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
                $consulta->bindParam(2, $descripcion, PDO::PARAM_STR);
                $consulta->bindParam(3, $estado, PDO::PARAM_STR);
                $consulta->execute();
                return 1;
            }

        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function consultarRoles($id){
        try {
            $consulta= Conexion::conect()->prepare("SELECT * FROM rol WHERE id=?;");
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $consulta->execute();
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p= new seguridadModel();
            $p->setidRol($r->id);
            $p->setnombreRol($r->nombre);
            $p->setdescripcionRol($r->descripcion);
            
            return $p;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function guardarRol(seguridadModel $p){
        try {
            $nombre=$p->getnombreRol();
            $descripcion=$p->getdescripcionRol();
            $id=$p->getidRol();
            $consulta="UPDATE rol SET 
                nombre=:nombre,
                descripcion=:descr
                WHERE id=:id;
            ";
            $consulta=Conexion::conect()->prepare($consulta);
            $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $consulta->bindParam(':descr', $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(':id', $id, PDO::PARAM_STR);
            $consulta->execute();
            return true;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function eliminarRol($id){
        try {
            $consulta1="SELECT u.id FROM usuarios as u, rol as r WHERE u.id_rol = r.id and r.id=?";
                $consulta1= Conexion::conect()->prepare($consulta1);
                $consulta1->bindParam(1, $id, PDO::PARAM_INT);
                $consulta1->setFetchMode(PDO::FETCH_ASSOC);
                $consulta1->execute();
                if ($consulta1->rowCount() <= 0) {
                    $estado=0;
                    $consulta="UPDATE rol SET estado=? WHERE id=?;";
                    Conexion::conect()->prepare($consulta)->execute(array($estado,$id)); 
                    return 1;
                }else{
                    
                    return 0;
                }
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }







    public function obtenerPermisos($rol_id){
        try {

            $sql="SELECT p.nombre as permiso FROM rol r 
            INNER JOIN rol_permiso rp ON r.id=rp.id_rol INNER JOIN permisos p ON rp.id_permiso=p.id 
            WHERE r.id = ? 
            ORDER BY rp.id_permiso";
            $consulta = parent::conect()->prepare($sql);
            $consulta->execute(array(
                $rol_id
            ));
            $perm = $consulta->fetchAll(PDO::FETCH_OBJ);
            $permisos = [];
            $i = 0;
            foreach($perm as $p){
                $permisos[$i] = ucwords($p->permiso);
                $i++;
            }
            return $permisos;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }


    public function insertarRol_Permiso($rol_id, $permiso_id){
        try {

            $consulta="INSERT INTO rol_permiso(id_rol, id_permiso)
            VALUES (?,?)";
            parent::conect()->prepare($consulta)->execute(array(
                $rol_id,
                $permiso_id
            ));
            return true;
            
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function eliminarRol_Permiso($rol_id){
        try {

            $consulta="DELETE FROM rol_permiso WHERE id_rol = ?";
            $resp = parent::conect()->prepare($consulta)->execute(array(
                $rol_id
            ));
            return $resp;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }


}
?>