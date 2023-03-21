<?php 
	namespace content\libraries\core; 
	use PDO;
	class Conexion{

	
		public static function conect(){
			
			$connectionString = "mysql:host="._DB_HOST_.";dbname="._DB_WEB_.";.DB_CHARSET.";
			try{
				$conect = new PDO($connectionString, _DB_USER_, _DB_PASSWORD_);
				$conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				if (isset($_SESSION['id_usuario'])) {
					$conect->exec('SET @usuario_id := "'.$_SESSION['id_usuario'].'"');
				}
				
				return $conect;
			}catch(PDOException $e){
				$conect = 'Error de conexión';
				echo "ERROR: " . $e->getMessage();
			}
		}
		
	}

 ?>