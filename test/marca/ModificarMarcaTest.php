<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/marcaModel.php");


class ModificarMarcaTest extends TestCase{

	private $marca;

	public function setUp():void{
		$this->marca = new marcaModel();
	}

	//Cliente modificado correctamente
	public function testRegistroExitoso(){
        $this->marca->setnombre("yaracy");
        $this->marca->setid("5");
		$this->assertEquals(1, $this->marca->guardar($this->marca));
	}
	
}