<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/presentacionModel.php");

class EliminarpresentacionTest extends TestCase{
	private $presentacion;

	public function setUp():void{
		$this->presentacion = new presentacionModel();
	}

	
	//eliminar presentacion sin productos asignados
	public function testEliminacionpresentacionSinProductos(){
		$respuesta = $this->presentacion->eliminarpresentacion(8);
		$this->assertEquals(1, $respuesta);
	}
	
    //eliminar presentacion con productos asignados
	public function testEliminacionDepresentacionConProducto(){
		$respuesta = $this->presentacion->eliminarpresentacion(8);
		$this->assertEquals(0, $respuesta);
	}
}

 ?>