<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/proveedoresModel.php");


class ModificarproveedoresTest extends TestCase{

	private $proveedores;

	public function setUp():void{
		$this->proveedores = new proveedoresModel();
	}

	//Cliente modificado correctamente
	public function testModificacionExitosa(){
        $this->proveedores->setnombre("ANGELs");
        $this->proveedores->setnroDoc("");
        $this->proveedores->settipoDoc("");
        $this->proveedores->setdireccion("");
        $this->proveedores->setcontacto("");
        $this->proveedores->setid("2");
		$this->assertEquals(true, $this->proveedores->guardar($this->proveedores));
	}
	
}