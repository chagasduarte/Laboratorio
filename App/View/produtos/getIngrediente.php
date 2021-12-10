<?php 

	chdir('/var/www/html/Laboratorio/App');

	if (isset($_POST['id'])) {
		include_once('Controller/IngredienteController.php');
		$controller = new IngredienteController();
		$ingredientes = $controller->show($_POST['id']);
		echo json_encode($ingredientes);
	} else {
		echo "Deu erro!!!";
	}

?>