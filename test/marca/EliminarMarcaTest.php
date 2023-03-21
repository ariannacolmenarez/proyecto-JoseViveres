<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/marcaModel.php");

class EliminarMarcaTest extends TestCase{
	private $marca;

	public function setUp():void{
		$this->marca = new marcaModel();
	}

	
	//eliminar marca sin productos asignados
	public function testEliminacionmarcaSinProductos(){
		$respuesta = $this->marca->eliminarMarca(3);
		$this->assertEquals(1, $respuesta);
	}
	
    //eliminar marca con productos asignados
	public function testEliminacionDeMarcaConProducto(){
		$respuesta = $this->marca->eliminarMarca(3);
		$this->assertEquals(0, $respuesta);
	}
}

 ?>