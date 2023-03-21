<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/clientesModel.php");


class RegistrarClientesTest extends TestCase{

	private $clientes;

	public function setUp():void{
		$this->clientes = new clientesModel();
	}

	//el usuario Ingresa los datos correctos
	public function testRegistroExitoso(){
        $this->clientes->setnombre("ANGELs");
        $this->clientes->setnroDoc("12342345");
        $this->clientes->settipoDoc("CI");
        $this->clientes->settelefono("323423423");
		$this->assertEquals(1, $this->clientes->registrar($this->clientes));
	}
    //el usuario Ingresa los datos ya registrados
    public function testRegistroFallido(){
        $this->clientes->setnombre("ANGELs");
        $this->clientes->setnroDoc("12342345");
        $this->clientes->settipoDoc("CI");
        $this->clientes->settelefono("323423423");
		$this->assertEquals($this->clientes->getnroDoc(),$this->clientes->registrar($this->clientes));
	}
	
}
	

 ?>