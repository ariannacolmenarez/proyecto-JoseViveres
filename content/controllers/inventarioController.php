<?php
namespace content\controllers;
use content\models\inventarioModel;
use content\libraries\core\autoload;

class inventarioController extends autoload {
    private $model;
    function __construct()
    {
        parent::__construct();
        $this->model = new inventarioModel;

    }

    function inventario(){
        $data['page_tag'] = "Inventario | Market MP";
        $data['page_title'] = "Inventario";
        parent::getView("inventario", $data);
    }

    public function  listarCategoriasProd(){

        $respuesta = $this->model->listarCategoriasProd();
  
        foreach ($respuesta as $r){
          echo'  
          <option value="'.$r->id.'">'.$r->categoria.'</option>';
        };
  
    }

    public function  listar(){

      $data = '';

      $respuesta = $this->model->listar($_POST['opcion']);

    	foreach ($respuesta as $regist) {
                if ($respuesta->rowCount() > 6) {
                          $data .= '<div class="col p-1 "
                             ';
                          if(in_array("Modificar Inventario", $_SESSION['permisos'])){ 
                               $data .= ' onclick="editarProducto('.$regist['id'].')";'; 
                          } 
                          $data.='><div class="card h-100"><img src="';
                                  if($regist['url_img'] != NULL){
                                      $data .= $regist['url_img'];
                                  } else{
                                      $data .= "assets/images/MP.png";
                                  }  
                                  $data .='" >
                                <div class="card-body text-center">
                                    <h6 class="card-title text-success">'.$regist["nombre"].' '.$regist["marca"].'</h6>
                                    <p class="card-text">'.$regist["volumen"].$regist["unidad_medida"].' * '.$regist["unidades"].' UND</p>
                                    <p class="card-text">'.$regist["precio_venta"].' BS</p>
                                    <h6 class="text-muted">'.$regist["cantidad"].'<small> disponible</small></h6>                            
                                </div>
                            </div>
                          </div>';
                }elseif ($respuesta->rowCount() <= 6) {
                        $data .= '<div class="col p-1 "
                         ';
                        if(in_array("Modificar Inventario", $_SESSION['permisos'])){ 
                            $data .= ' onclick="editarProducto('.$regist['id'].')";'; 
                        } $data.='><div class="card h-100"><img src="';
                                if($regist['url_img'] != NULL){
                                    $data .= $regist['url_img'];
                                } else{
                                    $data .= "assets/images/MP.png";
                                }  
                                $data .='" >
                            <div class="card-body text-center">
                                <h6 class="card-title text-success">'.$regist["nombre"].' '.$regist["marca"].'</h6>
                                <p class="card-text">'.$regist["volumen"].$regist["unidad_medida"].' * '.$regist["unidades"].' UND</p>
                                <p class="card-text">'.$regist["precio_venta"].' BS</p>
                                <h6 class="text-muted">'.$regist["cantidad"].'<small> disponible</small></h6>                            
                            </div>
                        </div>
                        </div>';
                }
    	};

      $data .= '';

      echo json_encode($data);
    }

    public function  totalProd(){
        $respuesta = $this->model->totalProd();
        if ($respuesta["prod"] == NULL) {
          echo 0;
        }else {
          echo $respuesta["prod"];
        }
    }

    public function buscar(){
        $data = '';
        $respuesta = $this->model->buscar($_POST["busqueda"]);
        if ($respuesta->rowCount() > 0) {
            if(in_array("Consultar Inventario", $_SESSION['permisos'])){ 
            foreach ($respuesta as $regist) {
                $data .= '<div class="col p-1 "
                ';
             if(in_array("Modificar Inventario", $_SESSION['permisos'])){ 
                  $data .= ' onclick="editarProducto('.$regist['id'].')";'; 
             } 
             $data.='><div class="card h-100"><img src="';
                     if($regist['url_img'] != NULL){
                         $data .= $regist['url_img'];
                     } else{
                         $data .= "assets/images/MP.png";
                     }  
                     $data .='" >
                   <div class="card-body text-center">
                       <h6 class="card-title text-success">'.$regist["nombre"].' '.$regist["marca"].'</h6>
                       <p class="card-text">'.$regist["volumen"].$regist["unidad_medida"].' * '.$regist["unidades"].' UND</p>
                       <p class="card-text">'.$regist["precio_venta"].' BS</p>
                       <h6 class="text-muted">'.$regist["cantidad"].'<small> disponible</small></h6>                            
                   </div>
               </div>
             </div>';
            }
        }
        }else {$data .= '<div class="row text-center">
                          <div class="col text-secondary text-center">No hay registros</div>
                        </div>';
        }
        $data .= '';
  
        echo $data;
      }

}