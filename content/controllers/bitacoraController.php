<?php
  namespace content\controllers;
  use content\models\bitacoraModel;
  use content\libraries\core\autoload;

  class bitacoraController extends autoload {

    private $model;
      function __construct()
      {
          parent::__construct();
          $this->model = new bitacoraModel;

      }

      function bitacora(){
          $data['page_tag'] = "Bitacora | Market MP";
          $data['page_title'] = "Bitacora";
          parent::getView("bitacora", $data);
      }

      public function  listar(){

          $data = '<table class="table" id="exampleb">
          <thead class="my-3">
            <tr>
              <th>Fecha</th>
              <th>Usuario</th>
              <th>Acción</th>
              <th>Módulo</th>
            </tr>
          </thead>
          <tbody>';
          
          $respuesta = $this->model->listar();
    
            foreach ($respuesta as $regist) {
              if($respuesta->rowCount()>0){
                $data .= '<tr class="my-3">
              <td>'.$regist['fecha'].'</td>
              <td>'.$regist['nombre'].'</td>
              <td>'.$regist['accion'].'</td>
              <td>'.$regist['modulo'].'</td>
            </tr>'; 
              }else{
                  $data .='<td class="text-center">No hay registros</td>';
              }
              
            };
    
          $data .= '</tbody>
          </table>';
    
          echo $data;
      }

      public function insertar($fecha,$accion,$modulo,$id_usuario){
        if (!empty( $fecha && $accion && $modulo && $id_usuario)) {
          $this->model->insertar($fecha,$accion,$modulo,$id_usuario);
        }
      }
  }