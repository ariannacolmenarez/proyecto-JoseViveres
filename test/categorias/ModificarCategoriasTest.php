<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/categoriasModel.php");


class ModificarCategoriasTest extends TestCase{

	private $categorias;

	public function setUp():void{
		$this->categorias = new categoriasModel();
	}

	//Cliente modificado correctamente
	public function testRegistroExitoso(){
        $this->categorias->setnombre("vegetales");
        $this->categorias->setid("38");
		$this->assertEquals(1, $this->categorias->guardar($this->categorias));
	}
	
}