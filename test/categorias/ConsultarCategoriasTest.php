<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/categoriasModel.php");

class ConsultarcategoriasTest extends TestCase{
	private $categorias;

	public function setUp():void{
		$this->categorias = new categoriasModel();
	}

	//categorias consultados correctamente
	public function testConsultaExitosa(){
        $news = $this->categorias->listar();
        foreach ($news as $item) {
            $this->assertIsArray($item);
        }
	}

}

?>