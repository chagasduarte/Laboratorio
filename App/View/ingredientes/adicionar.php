<?php include('../Templates/pre_def.php') ?>

<?php

	if ($_SESSION['papel'] != 'ADMIN') {
		header("location: ../index.php");
		exit;
	}

	include_once('Controller/IngredienteController.php');
	$controller = new IngredienteController();

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionar'])) {
		$controller->insert(new Ingrediente(null, $_POST['nome'], $_POST['quantidade'], $_POST['unidade']));
		header("location: listar.php");
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
			        <h4>Adicionar Item</h4>
			    </div>

	        	<form action="" method="post">
		        	<div class="row mb-3">
			        	<div class="form-group col-8">
	        	      		<label>Nome</label>
	        	      		<input type="text" class="form-control text-uppercase" name="nome">
	        	    	</div>
	        	    	<div class="form-group col-2">
	        	      		<label>Qtd.</label>
	        	      		<input type="number" step="0.01" min="0" class="form-control" name="quantidade">
	        	    	</div>
	        	    	<div class="form-group col-2">
	        	      		<label>Unidade</label>
	        	      		<select name="unidade" class="form-select" required>
	        	      		  <option selected>Selecione</option>
	        	      		  <option value="kg">Kilogramas (kg)</option>
	        	      		  <option value="g">Gramas (g)</option>
	        	      		  <option value="l">Litros (l)</option>
	        	      		  <option value="ml">Mililitros (ml)</option>
	        	      		  <option value="und">Unidades</option>
	        	      		</select>
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