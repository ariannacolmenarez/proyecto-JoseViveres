<?php
    namespace content\libraries\core; 
    use content\libraries\core\Conexion;
    use PDO;

    class builder extends Conexion {

        public static  function duplicados($campo,$tabla,$resultado){
            $sql= "SELECT COUNT(*) FROM $tabla where $campo = '$resultado'";
            $desc=parent::conect()->prepare($sql);
            $desc->execute();
            $cantidad=$desc->fetchColumn();

            if ($cantidad > 0) { 
                $sql= "SELECT * FROM $tabla WHERE $campo = '$resultado'";
                $consulta= parent::conect()->prepare($sql);
                $consulta->execute();
                $result=$consulta->fetch(PDO::FETCH_ASSOC);
                
                if ($result["$campo"] = $resultado && $result["estado"]== 0 ) {
                    $consulta="DELETE FROM $tabla WHERE $campo = '$resultado' and estado = 0";
                    parent::conect()->prepare($consulta)->execute(); 
                    return true;
                }else{
                    return false;
                }
                
            }else{
                return true;
            }
            
        }

        public static  function duplicado_persona($resultado,$tipo){
            $sql= "SELECT COUNT(*) FROM persona where nro_doc = '$resultado' and id_tipo_persona='$tipo'";
            $desc=parent::conect()->prepare($sql);
            $desc->execute();
            $cantidad=$desc->fetchColumn();
            
            if ($cantidad > 0) { 
                $sql= "SELECT * FROM persona WHERE nro_doc = '$resultado' and id_tipo_persona='$tipo'";
                $consulta= parent::conect()->prepare($sql);
                $consulta->execute();
                $result=$consulta->fetch(PDO::FETCH_ASSOC);
                if ($result["nro_doc"] = $resultado && $result["estado"]== 0 && $result["id_tipo_persona"]==$tipo ) {
                    $consulta="DELETE FROM persona WHERE nro_doc = '$resultado' and estado = 0 and id_tipo_persona=$tipo";
                    parent::conect()->prepare($consulta)->execute(); 
                    return true;
                }else{
                    return false;
                }
                
            }else{
                return true;
            }
            
        }

    public static function encriptar($cadena)
    {
        $salida = FALSE;
        $password = hash('sha256', "joseviveres*"); //Genera Valor Cifrado en base a un string
        $vectorInicializacion = substr(hash('sha256', "1997"), 0, 16);
        $salida = openssl_encrypt($cadena, "AES-256-CBC", $password, 0, $vectorInicializacion);
        $salida = base64_encode($salida);
        return $salida;
    }

    public static function desencriptar($cadena)
    {
        $password = hash('sha256', "joseviveres*");
        $vectorInicializacion = substr(hash('sha256', "1997"), 0, 16);
        $salida = openssl_decrypt(base64_decode($cadena), "AES-256-CBC", $password, 0, $vectorInicializacion);
        return $salida;
    }

    }

?>