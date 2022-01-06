<?php include('../Templates/pre_def.php') ?>

<?php

	if ($_SESSION['papel'] != 'ADMIN' && $_SESSION['papel'] != 'GERENTE') {
		header("location: ../index.php");
		exit;
	}

	include_once('Controller/ProdutoController.php');
	include_once('Controller/IngredienteController.php');

	$pro_controller = new ProdutoController();

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionar'])) {
		$id = $pro_controller->insert(new Produto(null, $_POST['nome'], null, $_POST['preco'], null));
		header("location: adicionar_ing.php?id=".$id);
		exit;
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
			        <h4>Adicionar Produto</h4>
			    </div>

	        	<form action="" method="post" enctype="multipart/form-data">
		        	<div class="row mb-3">
			        	<div class="form-group col-12">
	        	      		<label>Nome</label>
	        	      		<input type="text" class="form-control text-uppercase" name="nome">
	        	    	</div>
	        	    </div>
	        	    <div class="row mb-3">
	        	    	<div class="form-group col-4">
							<label>Preço</label>
							<input type="number" class="form-control" step="0.01" name="preco">
	        	    	</div>
	        	    	<div class="form-group col-8">
							<label>Imagem</label>
							<input class="form-control" type="file" name="imagem">
	        	    	</div>
        	    	</div>
        	    	<div class="d-flex justify-content-end">
        	    		<a type="button" class="mx-1 btn btn-secondary" href="listar.php">Cancelar</a>
	        	      	<button type="submit" name="adicionar" class="btn btn-success">Salvar</button>
        	    	</div>
    	    	</form>

			</div>

		</div>

  		<?php include('View/Templates/footer.php') ?>
		<?php include('View/Templates/html-script.php') ?>
	</body>
</html>