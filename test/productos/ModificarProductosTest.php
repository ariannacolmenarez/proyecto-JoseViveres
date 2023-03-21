<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/productosModel.php");


class ModificarProductosTest extends TestCase{

	private $productos;

	public function setUp():void{
		$this->productos = new productosModel();
	}

	//Cliente modificado correctamente
	public function testRegistroExitoso(){
        $this->productos->setnombre("vegetales");
        $this->productos->setid_categoria("33");
        $this->productos->setid_marca("1");
        $this->productos->setid_presentacion("5");
        $this->productos->setdescripcion("");
        $this->productos->seturl_img(null);
        $this->productos->setid("35");
		$this->assertEquals(1, $this->productos->guardar($this->productos));
	}
	
}