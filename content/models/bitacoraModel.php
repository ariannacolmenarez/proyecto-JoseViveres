<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;

class bitacoraModel extends Conexion{

    public static function listar(){
        try {
             
                $sql= "SELECT * FROM bitacora, usuarios WHERE bitacora.id_usuario=usuarios.id";
                $consulta= Conexion::conect()->prepare($sql);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                return $consulta;
                

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertar($fecha, $accion, $modulo, $id_usuario){
        try {
            $sql = Conexion::conect()->prepare('INSERT INTO bitacora(
            fecha , 
            accion,
            modulo,
            id_usuario)
			VALUES(
                :fecha, 
                :accion, 
                :modulo, 
                :id_usuario);');
            $sql->bindParam(':fecha', $fecha, PDO::PARAM_STR, 10);
            $sql->bindParam(':accion', $accion, PDO::PARAM_STR, 50);
            $sql->bindParam(':modulo', $modulo, PDO::PARAM_STR, 20);
            $sql->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

            $sql->execute();
            // $consulta="INSERT INTO bitacora(
            //     fecha , 
            //     accion,
            //     modulo,
            //     id_usuario)
            // VALUES (?,?,?,?)";
            // Conexion::conect()->prepare($consulta)->execute(array(
            //     $fecha,
            //     $accion,
            //     $modulo,
            //     $id_usuario
            // ));

        } catch (Exception $e) {

            die($e->getMessage());
        }
    }
}