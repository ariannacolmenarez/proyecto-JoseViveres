<?php
namespace content\config\settings;
#uri
$directory="http://localhost/jose%20viveres/";
define("_DIRECTORY_",$directory);
define("_CONTROLLER_","./content/controllers/");
define("_INDEX_FILE_",$directory."index.php");
define("_THEME_",$directory."assets/");
define("_CONTENT_",$directory."content/");
define("_MODEL_","./content/models/");
define("_DB_SERVER_","http://localhost/");
#database
define("_DB_WEB_","joseviveresbd");
define("_DB_HOST_","localhost");
define("_DB_USER_","root");
define("_DB_PASSWORD_","");
define("_DB_CHARSET_","charset=utf8");
#encriptado
define("_METODO_","AES-256-CBC");
define("_CODIGO_PASSWORD_","joseviveres*");
define("_CODIGO_VECTOR_","1997");

class SysConfig {
    
    public function _init(){
        if(file_exists("content/controllers/frontController.php")){
            
        }else{
            die("fallo");
        }
    }


}

?>