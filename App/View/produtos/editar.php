<?php include('../Templates/pre_def.php') ?>

<?php

	if ($_SESSION['papel'] != 'ADMIN' && $_SESSION['papel'] != 'GERENTE') {
		header("location: ../index.php");
		exit;
	}

	include_once('Controller/ProdutoController.php');

	$controller = new ProdutoController();

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['atualizar'])) {
		if (isset($_FILES["imagem"])) {
			echo $controller->update(new Produto($_POST['id'], $_POST['nome'], $_FILES["imagem"], $_POST['preco'], null));
		} else {
			echo $controller->update(new Produto($_POST['id'], $_POST['nome'], null , $_POST['preco'], null));
		}
		
		header("location: adicionar_ing.php?id=".$_POST['id']);
		exit;
	}

	if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
		$produto = $controller->show($_GET['id']);
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
			        <h4>Editar Produto</h4>
			    </div>

	        	<form action="" method="post" enctype="multipart/form-data">
				    <div class="row col-12 mb-3">
				    	<div class="col-8">
				        	<div class="row mb-3">
					        	<div class="form-group col-12">
			        	      		<label>Nome</label>
			        	      		<input type="text" class="form-control text-uppercase" name="nome" value="<?php echo $produto['pro_nome'] ?>" required>
			        	    	</div>
			        	    </div>
			        	    <div class="row mb-3">
			        	    	<div class="form-group col-4">
			        	      		<label>Código</label>
			        	      		<input type="number" class="form-control" name="id" value="<?php echo $produto['pro_id'] ?>" readonly>
			        	    	</div>
			        	    	<div class="form-group col-8">
									<label>Preço</label>
									<input type="number" class="form-control" step="0.01" name="preco" value="<?php echo $produto['pro_preco'] ?>" required>
			        	    	</div>
			    	    	</div>
			    	    	<div class="row mb-3">
	    	        	    	<div class="form-group col-12">
	    							<label>Imagem</label>
	    							<input class="form-control" type="file" name="imagem">
	    	        	    	</div>
	    	        	    </div>
		    	    	</div>
		    	    	<div class="col-4">
		    	    		<img class="rounded " src="<?php echo $uploads.'/Produtos/'.$produto['pro_imagem'] ?>" style="width: 100%; fit: cover;">
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