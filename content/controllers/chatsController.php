<?php

	define("SOKECT_FRONTEND", "127.0.0.1:12345");



	if(isset($_POST["name"])&&isset($_POST["message"])){
		if(isset($_SESSION['id_usuario'])){
			$dataTime = "<br><span>".date('d M Y H:i:s')."</span>";
			$array[] = array('name' => $_POST["name"], 'message' => $_POST["message"], 'sesion' => $_SESSION['id_usuario'], "dataTime" => $dataTime);
			echo json_encode($array);
			exit;
		}
	}
	require_once("view/chats.php");
?>