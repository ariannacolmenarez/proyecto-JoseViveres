<?php 
	namespace content\models;
	use content\libraries\core\Conexion;
	use PDO;
	
	class notificacionesModel extends Conexion
	{
	
		public function __construct(){
			 parent::conect();
		}

		public static function listar($limit){
			try {
					$sql= "SELECT * FROM notificaciones WHERE estado = 1 ORDER BY created_at DESC LIMIT $limit";
					$consulta= parent::conect()->prepare($sql);
					$consulta->execute();
					return $consulta->fetchALL(PDO::FETCH_OBJ);
	
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function eliminar($id){
			try {
            	$consulta="UPDATE notificaciones SET estado=0 WHERE id=?;";
				$consulta=parent::conect()->prepare($consulta);
				$consulta->bindParam(1, $id, PDO::PARAM_INT);
				$consulta->execute();
				return true;
			} catch (Exception $e) {
				return false;
			}
		}

		public function registrar(){
			try {
				
				
				$consulta='SELECT * FROM ( SELECT m.id, m.fecha,m.total,m.id_proveedor,m.id_cliente, ( CASE WHEN m.id_proveedor>0 THEN p.nombre WHEN m.id_cliente >0 THEN cl.nombre END) AS nombre, m.estado_movimiento,c.categoria, DATEDIFF(NOW(), fecha) diferencia FROM movimientos as m,proveedores as p,clientes as cl, concepto_movimiento as c WHERE c.id=m.id_concepto_movimiento and m.id_proveedor = p.id or m.id_cliente=cl.id and m.estado = 1 and m.estado_movimiento = "A CREDITO" ) T WHERE T.diferencia >= 0 AND T.estado_movimiento="A CREDITO" GROUP by T.id';
				$consulta= parent::conect()->prepare($consulta);
				$consulta->execute();
				$p = $consulta->fetchALL(PDO::FETCH_OBJ);
					
					foreach ($p as $row) {
						if ($row->id_proveedor!= NULL) {
							$titulo = " Tienes una dueda atrasada con ".$row->nombre;
							$mensaje = "la deuda es del ".$row->fecha." por ".$row->total." bs";
							$estado = 1;
						}else {
							$titulo = $row->nombre." tiene una dueda atrasada";
							$mensaje = "la deuda es del ".$row->fecha." por ".$row->total." bs";
							$estado = 1;
						}
						
					
						$stmt = Conexion::conect()->prepare('INSERT INTO notificaciones(titulo,mensaje,estado)
												VALUES(:titulo, :mensaje, :estado);
											');
					
						$stmt->execute([':titulo' => $titulo,
										':mensaje' => $mensaje,
										':estado' => $estado
										]);
	
					}

				$consulta2='SELECT p.nombre, m.nombre as marca,id.cantidad AS cantidad from productos as p, marca_producto as m, ingreso_detalles as id WHERE p.id=id.id_producto AND p.id_marca=m.id AND id.cantidad < 5';
				$consulta2= parent::conect()->prepare($consulta2);
				$consulta2->execute();
				$p2 = $consulta2->fetchALL(PDO::FETCH_OBJ);
					
					foreach ($p2 as $row) {
						
							$titulo = " Tienes un producto que se esta agotando";
							$mensaje = $row->nombre."".$row->marca." Este producto se esta agotando tienes solo ".$row->cantidad." en stock";
							$estado = 1;
						
					
						$stmt = Conexion::conect()->prepare('INSERT INTO notificaciones(titulo,mensaje,estado)
												VALUES(:titulo, :mensaje, :estado);
											');
					
						$stmt->execute([':titulo' => $titulo,
										':mensaje' => $mensaje,
										':estado' => $estado
										]);
	
					}
				
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	
		
	}

?>