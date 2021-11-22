<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	session_start();
	$css = '../../Public/css';
	$js = '../../Public/js';
	$img = '../../Public/img';
	$titulo = 'Pizzaria do Luigi';
?>

<!DOCTYPE html>
<html class="h-100">
	<?php include('Templates/html-head.php'); ?>
	<body class="d-flex flex-column h-100">
  		<?php include('Templates/header.php') ?>
  		
  		<div class="container-fluid col-lg-10 p-0">
			
		<?php

			if (isset($_SESSION['logado']) && $_SESSION['logado']) {
				if ($_SESSION['papel'] == 'cliente') {
					include('index/cliente.php');
				} elseif ($_SESSION['papel'] == 'admin') {
					include('index/admin.php');
				} else {
					include('index/funcionario.php');
				}

			} else {
				include('index/cliente.php');
			}

		?>
    		
		
		</div>
  	
  		<?php include('Templates/footer.php') ?>
		<?php include('Templates/html-script.php') ?>
	</body>
</html>
