<?php include('../Templates/pre_def.php') ?>

<?php

	if ($_SESSION['papel'] != 'ADMIN' && $_SESSION['papel'] != 'GERENTE') {
		header("location: ../index.php");
		exit;
	}

	include_once('Controller/FuncionarioController.php');
	$controller = new FuncionarioController();

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['atualizar'])) {
		$controller->update(new Funcionario($_POST['id'], $_POST['nome'], $_POST['email'], null, $_POST['funcao'], $_POST['endereco'], $_POST['cidade'], $_POST['cep'], $_POST['celular']));
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

			<div class="col-8 container p-3 border rounded my-5">
				<div class="d-flex justify-content-center p-3">
			        <h4>Editar Funcionário</h4>
			    </div>

	        	<form id="editar-form" action="" method="post">
		        	<div class="row mb-3">
		        		<div class="form-group col-2">
	        	      		<label>Código</label>
	        	      		<input type="text" class="form-control" name="id" value="<?php echo $funcionario['fun_id'] ?>" required readonly>
	        	    	</div>
			        	<div class="form-group col-5">
	        	      		<label>Nome</label>
	        	      		<input type="text" class="form-control text-uppercase" name="nome" value="<?php echo $funcionario['fun_nome'] ?>" required>
	        	    	</div>
	        	    	<div class="form-group col-5">
	        	      		<label>E-mail</label>
	        	      		<input type="email" class="form-control" name="email" value="<?php echo $funcionario['fun_email'] ?>" required>
	        	    	</div>
        	    	</div>
        	    	<div class="row mb-3">
	        	    	<div class="form-group col-6">
	        	      		<label>Endereço</label>
	        	      		<input type="text" class="form-control text-uppercase" name="endereco" value="<?php echo $funcionario['fun_endereco'] ?>" required>
	        	    	</div>
	        	    	<div class="form-group col-3">
	        	      		<label>Cidade</label>
	        	      		<input type="text" class="form-control text-uppercase" name="cidade" value="<?php echo $funcionario['fun_cidade'] ?>" required>
	        	    	</div>
	        	    	<div class="form-group col-3">
	        	      		<label>CEP</label>
	        	      		<input type="number" class="form-control text-uppercase" name="cep" value="<?php echo $funcionario['fun_cep'] ?>" required>
	        	    	</div>
        	    	</div>
        	    	<div class="row mb-3">
	        	    	<div class="form-group col-3">
	        	      		<label>Função</label>
	        	      		<select name="funcao" class="form-select" required <?= ($_SESSION['papel'] == 'GERENTE' && $funcionario['fun_funcao'] == 'GERENTE')? 'readonly': '' ?>>
	        	      		  <option selected>Selecione</option>
	        	      		  <?php if ($_SESSION['papel'] != 'GERENTE' || $funcionario['fun_funcao'] != 'ATENDENTE') {  ?>
	        	      		  <option <?php if ($funcionario['fun_funcao'] == 'GERENTE')  { ?>selected="true" <?php }; ?> value="gerente">Gerente</option>
	        	      		  <?php } ?>
	        	      		  <option <?php if ($funcionario['fun_funcao'] == 'ATENDENTE')  { ?>selected="true" <?php }; ?> value="atendente">Atendente</option>
	        	      		</select>
	        	    	</div>
	        	    	<div class="form-group col-3">
	        	      		<label>Celular</label>
	        	      		<input type="number" class="form-control" name="celular" value="<?php echo $funcionario['fun_celular'] ?>" required>
	        	    	</div>
        	    	</div>
        	    	<div class="d-flex justify-content-end">
        	    		<a type="button" class="mx-1 btn btn-secondary" href="listar.php">Cancelar</a>
        	    		<?php if ($funcionario['fun_funcao'] != 'ADMIN') { ?>
	        	      		<button type="submit" name="atualizar" class="btn btn-success">Salvar</button>
	        	      	<?php } ?>
        	    	</div>
    	    	</form>
			</div>

		</div>

  		<?php include('View/Templates/footer.php') ?>
		<?php include('View/Templates/html-script.php') ?>
		<?php if ($funcionario['fun_funcao'] == 'ADMIN') { ?>
			<script type="text/javascript">
				$('#editar-form input').attr('readonly', 'readonly');
				$('#editar-form select').attr('readonly', 'readonly');
			</script>
		<?php } ?>

	</body>
</html>