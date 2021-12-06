<?php include('../Templates/pre_def.php') ?>

<?php

	if ($_SESSION['papel'] != 'ADMIN') {
		header("location: ../index.php");
		exit;
	}

	include_once('Controller/FuncionarioController.php');
	$controller = new FuncionarioController();

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['excluir'])) {
		$funcionario = $controller->delete($_POST['excluir']);
		header("location: listar.php");
		exit;
	}

	if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
		$funcionario = $controller->show($_GET['id']);
	}

?>

<!DOCTYPE html>
<html class="h-100">
	<?php include('View/Templates/html-head.php') ?>
	<body class="d-flex flex-column h-100">
		<?php include('View/Templates/header.php') ?>
		<div class="container-fluid col-lg-10 p-0">

			<div class="col-6 container p-3 border rounded my-5">
				<div class="d-flex justify-content-center p-3">
			        <h4>Excluir Funcionário</h4>
			    </div>
			    <?php if ($funcionario['fun_funcao'] == 'ADMIN') { ?>
			    	Não é possível excluir o administrador <?php echo $funcionario['fun_id'] ?> - <?php echo $funcionario['fun_nome'] ?>.
			    <?php } else { ?>
					Tem certeza que deseja excluir o funcionário <?php echo $funcionario['fun_id'] ?> - <?php echo $funcionario['fun_nome'] ?>?
				<?php } ?>

				<div class="justify-content-end d-flex mt-4">
					<a type="button" class="btn btn-secondary mx-1" href="listar.php">Cancelar</a>
					<?php if ($funcionario['fun_funcao'] != 'ADMIN') { ?>
						<form action="" method="post">
							<button type="submit" name="excluir" value="<?php echo $funcionario['fun_id'] ?>" class="btn btn-danger">Excluir</button>
						</form>
					<?php } ?>
				</div>
			</div>

		</div>

  		<?php include('View/Templates/footer.php') ?>
		<?php include('View/Templates/html-script.php') ?>
	</body>
</html>