<?php 
use PHPUnit\Framework\TestCase;
require_once("./content/models/reporteDeudasModel.php");

class ConsultarReporteDeudasTest extends TestCase{
	private $reporte;

	public function setUp():void{
		$this->reporte = new reporteDeudasModel();
	}

	//reportes con resultados
	public function testConsultaConResultados(){
        $consulta = $this->reporte->getBalance(array(
            "periodo"=>"3/5/2023 - 3/11/2023",
            "tipoPeriodo"=>"Semanal"
        ));
        $this->assertIsArray($consulta);
	}
    //reportes sin resultados
    public function testConsultaSinResultados(){
        $consulta = $this->reporte->getBalance(array(
            "periodo"=>"3/5/2023 - 3/11/2023",
            "tipoPeriodo"=>"Semanal"
        ));
        $this->assertEquals("", $consulta);
	}

}

 ?>