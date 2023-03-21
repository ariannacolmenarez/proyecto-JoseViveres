<?php 

	class Conexion{

	
		public static function conect(){
			
			$connectionString = "mysql:host=localhost;dbname=joseviveresbd;.DB_CHARSET.";
			try{
				$conect = new PDO($connectionString, "root", "");
				$conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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