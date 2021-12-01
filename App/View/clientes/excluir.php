<?php include('../Templates/pre_def.php') ?>

<?php

	if ($_SESSION['papel'] != 'ADMIN') {
		header("location: ../index.php");
		exit;
	}

	include_once('Controller/ClienteController.php');
	$controller = new ClienteController();

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['excluir'])) {
		$cliente = $controller->delete($_POST['excluir']);
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

			<div class="col-5 container p-3 border rounded my-5">
				<div class="d-flex justify-content-center p-3">
			        <h4>Excluir Item</h4>
			    </div>

				Tem certeza que deseja excluir o item <?php echo $cliente['cli_id'] ?> - <?php echo $cliente['cli_nome'] ?>?

				<div class="justify-content-end d-flex mt-4">
					<a type="button" class="btn btn-secondary mx-1" href="listar.php">Cancelar</a>
					<form action="" method="post">
						<button type="submit" name="excluir" value="<?php echo $cliente['cli_id'] ?>" class="btn btn-danger">Excluir</button>
					</form>
				</div>
			</div>

		</div>

  		<?php include('View/Templates/footer.php') ?>
		<?php include('View/Templates/html-script.php') ?>
	</body>
</html>