<?php
require_once ('vendor/autoload.php');
use content\config\settings\SysConfig;
use content\controllers\frontController;
// require_once ('content/config/settings/SysConfig.php');
// require_once ('content/controllers/frontController.php');

// require_once ("content/libraries/core/conexionBd.php");
// require_once ("content/libraries/core/autoload.php");
// require_once ("content/libraries/core/builder.php");

if(!isset($_SESSION)) {
    session_start();
}
$Config = new SysConfig();
$Config->_init();

$index = new frontController($_GET);

?>