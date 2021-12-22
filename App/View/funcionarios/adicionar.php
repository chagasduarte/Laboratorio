<?php include('../Templates/pre_def.php') ?>

<?php

	if ($_SESSION['papel'] != 'ADMIN') {
		header("location: ../index.php");
		exit;
	}

	include_once('Controller/FuncionarioController.php');
	$controller = new FuncionarioController();

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionar'])) {
		if ($_POST['senha'] === $_POST['confirmar_senha']) {
			$controller->insert(new Funcionario(null, $_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['funcao'], $_POST['endereco'], $_POST['cidade'], $_POST['cep'], $_POST['celular']));
			header("location: listar.php");
			exit;
		} else {
			$err_msg = "Senhas não iguais.";
		}
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
			        <h4>Registrar Funcionário</h4>
			    </div>

	        	<form action="" method="post">
		        	<div class="row mb-3">
			        	<div class="form-group col-6">
	        	      		<label>Nome</label>
	        	      		<input type="text" class="form-control text-uppercase" name="nome" required>
	        	    	</div>
	        	    	<div class="form-group col-6">
	        	      		<label>E-mail</label>
	        	      		<input type="email" class="form-control" name="email" required>
	        	    	</div>
        	    	</div>
        	    	<div class="row mb-3">
	        	    	<div class="form-group col-6">
	        	      		<label>Endereço</label>
	        	      		<input type="text" class="form-control text-uppercase" name="endereco" required>
	        	    	</div>
	        	    	<div class="form-group col-3">
	        	      		<label>Cidade</label>
	        	      		<input type="text" class="form-control text-uppercase" name="cidade" required>
	        	    	</div>
	        	    	<div class="form-group col-3">
	        	      		<label>CEP</label>
	        	      		<input type="text" class="form-control text-uppercase cep" name="cep" required>
	        	    	</div>
        	    	</div>
        	    	<div class="row mb-3">
	        	    	<div class="form-group col-3">
	        	      		<label>Função</label>
	        	      		<select name="funcao" class="form-select" required>
	        	      		  <option value="" selected>Selecione</option>
	        	      		  <option value="gerente">Gerente</option>
	        	      		  <option value="atendente">Atendente</option>
	        	      		</select>
	        	    	</div>
	        	    	<div class="form-group col-3">
	        	      		<label>Celular</label>
	        	      		<input type="text" class="form-control celular" name="celular" required>
	        	    	</div>
	        	    	<div class="form-group col-3">
	        	      		<label>Senha</label>
	        	      		<input type="password" class="form-control" name="senha" required>
	        	    	</div>
	        	    	<div class="form-group col-3">
	        	      		<label>Confirmar Senha</label>
	        	      		<input type="password" class="form-control" name="confirmar_senha" required>
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