<?php include('../Templates/pre_def.php') ?>

<?php

	if ($_SESSION['papel'] != 'ADMIN' && $_SESSION['papel'] != 'GERENTE') {
		header("location: ../index.php");
		exit;
	}

	include_once('Controller/ClienteController.php');
	$controller = new ClienteController();

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['atualizar'])) {
		$controller->update(new Cliente($_POST['id'], $_POST['nome'], $_POST['email'], null));
		header("location: listar.php");
		exit;
	}

	if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
		$cliente = $controller->show($_GET['id']);
	}

?>

<!DOCTYPE html>
<html class="h-100">
	<?php include('View/Templates/html-head.php') ?>
	<body class="d-flex flex-column h-100">
		<?php include('View/Templates/header.php') ?>
		<div class="container-fluid col-lg-10 p-0">

			<div class="col-8 container p-3 border rounded my-5">
				<div class="d-flex justify-content-center p-3">
			        <h4>Editar Cliente</h4>
			    </div>

	        	<form action="" method="post">
		        	<div class="row mb-3">
		        		<div class="form-group col-2">
	        	      		<label>Código</label>
	        	      		<input type="text" class="form-control" name="id" value="<?php echo $cliente['cli_id'] ?>" readonly>
	        	    	</div>
			        	<div class="form-group col-6">
	        	      		<label>Nome</label>
	        	      		<input type="text" class="form-control text-uppercase" name="nome" value="<?php echo $cliente['cli_nome'] ?>">
	        	    	</div>
	        	    	<div class="form-group col-4">
	        	      		<label>E-mail</label>
	        	      		<input type="text" class="form-control" name="email" value="<?php echo $cliente['cli_email'] ?>">
	        	    	</div>
        	    	</div>
        	    	<div class="d-flex justify-content-end">
        	    		<a type="button" class="mx-1 btn btn-secondary" href="listar.php">Cancelar</a>
	        	      	<button type="submit" name="atualizar" class="btn btn-success">Salvar</button>
        	    	</div>
    	    	</form>
			</div>

		</div>

  		<?php include('View/Templates/footer.php') ?>
		<?php include('View/Templates/html-script.php') ?>
	</body>
</html>