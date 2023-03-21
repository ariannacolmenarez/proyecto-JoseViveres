<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;
use content\libraries\core\builder;

class usuariosModel extends Conexion{
    private $id;
    private $nombre;
    private $correo;
    private $rol_usuario;
    private $contraseña;

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

    public function getcorreo(){
        return $this->correo;
    }

    public function setcorreo( $correo){
        $this->correo=$correo;
    }

    public function getcontraseña(){
        return $this->contraseña;
    }

    public function setcontraseña( $contraseña){
        $this->contraseña=$contraseña;
    }

    public function getrol_usuario(){
        return $this->rol_usuario;
    }

    public function setrol_usuario( $rol_usuario){
        $this->rol_usuario=$rol_usuario;
    }

    public static function listar(){
        try {
             
                $sql= "SELECT * FROM usuarios WHERE estado !=0 ";
                $consulta= Conexion::conect()->prepare($sql);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                return $consulta;
                


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarRoles(){
        try {
            $consulta= Conexion::conect()->prepare("SELECT * FROM rol WHERE estado !=0");
            $consulta->execute();
            return $consulta->fetchALL(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function consultar($id){
        try {
            $consulta= Conexion::conect()->prepare("SELECT * FROM usuarios WHERE id=?;");
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $consulta->execute();
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p= new usuariosModel();
            $p->setid($r->id);
            $p->setnombre($r->nombre);
            $p->setcorreo($r->correo);
            $p->setcontraseña($r->clave);
            $p->setrol_usuario($r->id_rol);
            
            return $p;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function guardar(usuariosModel $p){
        try {
            $contraseña= builder::encriptar($p->getcontraseña());
            $nombre=$p->getnombre();
            $correo=$p->getcorreo();
            $clave=$contraseña;
            $rol=$p->getrol_usuario();
            $id= $p->getid();
            $estado="1";
            
                $consulta="UPDATE usuarios SET 
                    nombre=:nombre,
                    correo=:correo,
                    clave=:clave,
                    estado=:estado,
                    id_rol=:rol
                    WHERE id=:id;
                
                ";
                $consulta=Conexion::conect()->prepare($consulta);
                $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $consulta->bindParam(':correo', $correo, PDO::PARAM_STR);
                $consulta->bindParam(':clave', $clave, PDO::PARAM_STR);
                $consulta->bindParam(':rol', $rol, PDO::PARAM_INT);
                $consulta->bindParam(':estado', $estado, PDO::PARAM_STR, 5);
                $consulta->bindParam(':id', $id, PDO::PARAM_INT);
                $consulta->execute();
                return true;

        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function registrar(usuariosModel $p){
        try {
            $correo=$p->getcorreo();
            $nombre=$p->getnombre();
            $contraseña= builder::encriptar($p->getcontraseña());
            $clave=$contraseña;
            $rol=$p->getrol_usuario();
            $estado="1";
            if( builder::duplicados("correo","usuarios","$correo") === false ||
            builder::duplicados("nombre","usuarios","$nombre") === false ){
                return 0;
            }
            else{
                $contraseña= builder::encriptar($p->getcontraseña());
                $consulta="INSERT INTO usuarios(
                    nombre , 
                    correo,
                    clave,
                    estado,
                    id_rol)
                VALUES (?,?,?,?,?)";
                $consulta=Conexion::conect()->prepare($consulta);
                $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
                $consulta->bindParam(2, $correo, PDO::PARAM_STR);
                $consulta->bindParam(3, $clave, PDO::PARAM_STR);
                $consulta->bindParam(5, $rol, PDO::PARAM_INT);
                $consulta->bindParam(4, $estado, PDO::PARAM_STR, 5);
                $consulta->execute();
                return true;
            }

        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function eliminar($id){
        try {
            $estado=0;
            $consulta="UPDATE usuarios SET estado=? WHERE id=?;";
            $consulta=Conexion::conect()->prepare($consulta);
            $consulta->bindParam(1, $estado, PDO::PARAM_INT);
            $consulta->bindParam(2, $id, PDO::PARAM_INT);
            $consulta->execute();
            return 1;
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    public function buscar($busqueda){
        try {
            $term = "%$busqueda%";
            $term2 = "%$busqueda%";
            $estado=1;
            $consulta="SELECT * FROM usuarios WHERE estado =:estado AND nombre LIKE :term 
            OR correo LIKE :term2";

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

    public function verificarUsuario(){
        try {
            $nombre = $this->nombre;
            $sql="SELECT * FROM usuarios WHERE nombre = ? OR correo = ? and estado = '1';";
            $consulta = Conexion::conect()->prepare($sql);
            $consulta->execute(array($nombre,$nombre));
            $result = $consulta->fetch(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}

?>