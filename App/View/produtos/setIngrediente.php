<?php
    
	chdir('/var/www/html/Laboratorio/App');

	if (isset($_POST['pro_id'])) {
		include_once('Controller/ProdutoController.php');
		$controller = new ProdutoController();
		echo $controller->addIngrediente($_POST['pro_id'], $_POST['ing_id'], $_POST['quantidade']);
	} else {
		echo "Deu erro!!!";
	}

?>