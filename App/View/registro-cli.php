<?php
	
	include('Templates/pre_def.php');
	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		session_start();
		include_once('../Controller/UserController.php');
		$controller = new UserController();
		$controller->register();
	}
	
?>

<!DOCTYPE html>
<html class="h-100">
	<?php include('Templates/html-head.php') ?>
	<body class="d-flex flex-column h-100">
		<?php include('Templates/header.php'); ?>
		<div class="container-fluid col-lg-10 p-0">
		
    		<div class="mt-5 container bg-light border col-5 justify-content-center rounded p-4">
    			<div class="mb-4">
            		<h2 class="text-center font-lobster">Bem-vindo a pizzaria do Luigi!</h2>
                </div>
        		
            	
            	<form action="" method="post">
                	<input type="hidden" name="papel" value="cliente">
            		<div class="mb-3">
                		<input class="form-control text-center" type="text" name="nome" placeholder="Nome Completo" required>
                	</div>
            		<div class="mb-3">
                		<input class="form-control text-center" type="text" name="email" placeholder="E-mail" required>
                	</div>
                	<div class="mb-3">
                		<input class="form-control text-center" type="password" name="senha" placeholder="Senha" required>
                	</div>
                	<div class="mt-3 d-flex justify-content-center">
            			<button type="submit" name="submit" class="btn btn-green col-5">Registrar</button>
                	</div>
                </form>
				
				<div class="mt-2 d-flex justify-content-center">
            		<a href="#">Esqueceu a senha?</a>
                </div>
    		</div>
		
		</div>
  		<?php include('Templates/footer.php') ?>
		<?php include('Templates/html-script.php') ?>
	</body>
</html>