<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/categoriasModel.php");

class EliminarCategoriasTest extends TestCase{
	private $categorias;

	public function setUp():void{
		$this->categorias = new categoriasModel();
	}

	
	//eliminar categoria sin productos asignados
	public function testEliminacionCategoriaSinProductos(){
		$respuesta = $this->categorias->eliminarCat(41);
		$this->assertEquals(1, $respuesta);
	}
	
    //eliminar categorias con productos asignados
	public function testEliminacionDeCategoriaConProducto(){
		$respuesta = $this->categorias->eliminarCat(41);
		$this->assertEquals(0, $respuesta);
	}
}

 ?>