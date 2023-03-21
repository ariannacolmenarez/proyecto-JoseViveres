<?php
namespace content\models;
use content\libraries\core\Conexion;
use PDO;

class mantenimientoModel extends Conexion{
	
	public function __construct(){
		parent::conect();
	}

    public function respaldo(){
	 	$dir = "database/";
            $day=date("d");
            $mont=date("m");
            $year=date("Y");
            $hora=date("H-i-s");
            $fecha=$day.'_'.$mont.'_'.$year;
            $error = false;
            $con=mysqli_connect("localhost", "root", "","joseviveresbd");
            $r = $con->query("SELECT NOW() AS f_actual");
            $a = $r->fetch_assoc();
            $fechaA = $a['f_actual'];
            
            $DataBASE=$fecha."_(".$hora."_hrs).sql";
            $error = 0;
            $tables=array();
            $triggers=array();
            $result=mysqli_query($con, 'SET CHARACTER SET utf8');
            $result=mysqli_query($con, 'SHOW TABLES');
            $sql='SET FOREIGN_KEY_CHECKS=0;'."\nSET @usuario_id=1;\n\n";
            $sql.= "SET CHARACTER SET utf8; \n";
            
            if($result){
                while($row=mysqli_fetch_row($result)){
                $tables[] = $row[0];
                }
                foreach($tables as $table){
                    if($table[0]=='v' && $table[1]=="_"){
                        $sql.="\n";
                    }else{
                        $result=mysqli_query($con,'SELECT * FROM '.$table);
                        if($result){
                            $numFields=mysqli_num_fields($result);
                            $sql.='TRUNCATE TABLE '.$table.';';
                            $sql.="\n";
                            for ($i=0; $i < $numFields; $i++){
                                while($row=mysqli_fetch_row($result)){
                                    $sql.='INSERT INTO '.$table.' VALUES(';
                                    for($j=0; $j<$numFields; $j++){
                                        $row[$j]=addslashes($row[$j]);
                                        $row[$j]=str_replace("\n","\\n",$row[$j]);
                                        if (isset($row[$j])){
                                            $sql .= '"'.$row[$j].'"' ;
                                        }
                                        else{
                                            $sql.= '""';
                                        }
                                        if ($j < ($numFields-1)){
                                            $sql .= ',';
                                        }
                                    }
                                    $sql.= ");\n";
                                }
                            }
                            $sql.="\n\n\n";
                        }else{
                            $error=1;
                        }
                    }
                }
                if($error==1){
                    $error = true;
                }else{
                    chmod($dir, 0777);
                    $sql.='SET FOREIGN_KEY_CHECKS=1;';
                    $sql.="\n";
                    $sql.='DELETE FROM bitacora WHERE fecha > "'.$fechaA.'";';
                    $handle=fopen($dir.$DataBASE,'w+');
                    if(fwrite($handle, $sql)){
                        fclose($handle);
                        
                    }else{
                        $error = true;
                    }
                }
            }else{
                $error = true;
            }
            mysqli_free_result($result);
            if (!$error) {
                return 0;
            }
            else{
                $_SESSION["mensaje"] = "Ocurrio un error inesperado al crear la copia de seguridad";
                    $_SESSION["tipo_mensaje"] = "error";
            }

        }

        public function restaurar()
        {
            $sql=$_POST['sql'];
            echo "hola".$sql;
            $restore = $this->restore(_DB_HOST_, _DB_USER_, _DB_PASSWORD_,_DB_WEB_, $sql);
            
        }

        public function restore($server, $username, $password, $dbname, $location){
            //connection
            $conn = new mysqli($server, $username, $password, $dbname); 
        
            //variable use to store queries from our sql file
            $sql = '';
            
            //get our sql file
            $lines = file($location);
        
            //return message
            $output = array('error'=>false);
            
            //loop each line of our sql file
            foreach ($lines as $line){
        
                //skip comments
                if(substr($line, 0, 2) == '--' || $line == ''){
                    continue;
                }
        
                //add each line to our query
                $sql .= $line;
        
                //check if its the end of the line due to semicolon
                if (substr(trim($line), -1, 1) == ';'){
                    //perform our query
                    $query = $conn->query($sql);
                    if(!$query){
                        $_SESSION["mensaje"] = "Ocurrio un error inesperado al restaurar la Base de Datos";
                        $_SESSION["tipo_mensaje"] = "error";
                    }
                    else{
                        $_SESSION["mensaje"] = "¡Base de Datos restaurada con éxito!";
                        $_SESSION["tipo_mensaje"] = "success";
                    }
        
                    //reset our query variable
                    $sql = '';
                    
                }
            }
        
            return 0;
        }
        }



         

	 
?>