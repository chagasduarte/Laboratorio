<?php include('../Templates/pre_def.php') ?>

<?php

	if ($_SESSION['papel'] != 'ADMIN') {
		header("location: ../index.php");
		exit;
	}

	include_once('Controller/IngredienteController.php');
	$controller = new IngredienteController();

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['atualizar'])) {
		echo $controller->update(new Ingrediente($_POST['id'], $_POST['nome'], $_POST['quantidade'], $_POST['unidade']));
		header("location: listar.php");
		exit;
	}

	if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
		$ingrediente = $controller->show($_GET['id']);
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
			        <h4>Editar Item</h4>
			    </div>

	        	<form action="" method="post">
		        	<div class="row mb-3">
		        		<div class="form-group col-2">
	        	      		<label>Código</label>
	        	      		<input type="text" class="form-control" name="id" value="<?php echo $ingrediente['ing_id'] ?>" readonly>
	        	    	</div>
			        	<div class="form-group col-6">
	        	      		<label>Nome</label>
	        	      		<input type="text" class="form-control text-uppercase" name="nome" value="<?php echo $ingrediente['ing_nome'] ?>">
	        	    	</div>
	        	    	<div class="form-group col-2">
	        	      		<label>Qtd.</label>
	        	      		<input type="number" step="0.01" min="0" class="form-control" name="quantidade" value="<?php echo $ingrediente['ing_quantidade'] ?>">
	        	    	</div>
	        	    	<div class="form-group col-2">
	        	      		<label>Unidade</label>
	        	      		<select name="unidade" class="form-select" required>
	        	      		  <option>Selecione</option>
	        	      		  <option <?php if ($ingrediente['ing_unidade'] == 'kg')  { ?>selected="true" <?php }; ?> value="kg">Kilogramas (kg)</option>
	        	      		  <option <?php if ($ingrediente['ing_unidade'] == 'g')   { ?>selected="true" <?php }; ?> value="g">Gramas (g)</option>
	        	      		  <option <?php if ($ingrediente['ing_unidade'] == 'l')   { ?>selected="true" <?php }; ?> value="l">Litros (l)</option>
	        	      		  <option <?php if ($ingrediente['ing_unidade'] == 'und') { ?>selected="true" <?php }; ?> value="und">Unidades</option>
	        	      		</select>
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