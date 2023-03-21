<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/presentacionModel.php");


class ModificarpresentacionTest extends TestCase{

	private $presentacion;

	public function setUp():void{
		$this->presentacion = new presentacionModel();
	}

	//Cliente modificado correctamente
	public function testRegistroExitoso(){
        $this->presentacion->setvolumen("200");
        $this->presentacion->setmedidas("metros");
        $this->presentacion->setunidades("1");
        $this->presentacion->setid("8");
		$this->assertEquals(1, $this->presentacion->guardar($this->presentacion));
	}
	
}