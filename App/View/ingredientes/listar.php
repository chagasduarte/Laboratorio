<?php include('../Templates/pre_def.php') ?>

<?php

	if ($_SESSION['papel'] != 'admin') {
		header("location: ../index.php");
		exit;
	}

	include_once('Controller/IngredienteController.php');
	$controller = new IngredienteController();
	$ingredientes = $controller->showAll();

 ?>

<!DOCTYPE html>
<html class="h-100">
	<?php include('View/Templates/html-head.php') ?>
	<body class="d-flex flex-column h-100">
		<?php include('View/Templates/header.php') ?>
		<div class="container-fluid col-lg-10 p-0">

			<div class="col-8 container p-3 border rounded my-5">
				<div class="d-flex justify-content-center p-3">
			        <h4>Estoque</h4>
			    </div>
			    
			    <div>
					<table class="table table-striped table-hove table-bordered">
					    <thead>
					        <tr class="text-left">
					        	<th scope="col">CÓDIGO</th>
					        	<th scope="col">NOME</th>
					            <th scope="col">QUANTIDADE</th>
					            <th scope="col">UNIDADE</th>
					            <th scope="col" class="text-center">AÇÃO</th>
					        </tr>
					    </thead>
					    <tbody>
					        <?php 
					        	if ($ingredientes->num_rows > 0) {
					        		while ($ingrediente = $ingredientes->fetch_assoc()) {
					        ?>
					            <tr class="text-left">
					                <td scope="row"><?php echo $ingrediente['ing_id'] ?></td>
					                <td scope="row"><?php echo $ingrediente['ing_nome'] ?></td>
					                <td scope="row"><?php echo $ingrediente['ing_quantidade'] ?></td>
					                <td scope="row"><?php echo $ingrediente['ing_unidade'] ?></td>
					                <td class="text-center">
					                	<a href="editar.php?id=<?php echo $ingrediente['ing_id'] ?>" class="btn btn-success py-0 px-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
												<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
											</svg>
										</a>
					                	<a href="excluir.php?id=<?php echo $ingrediente['ing_id'] ?>" class="btn btn-danger py-0 px-1">
						                	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
					  							<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
											</svg>
										</a>
					                </td>
					            </tr>
					        <?php 
					        		}

					        		$ingredientes->free();
					        	} else {
					        ?>
					            <tr>
					                <td scope="row" colspan="7" class=" text-center">
					                    Nenhum ingrediente cadastrado.
					                </td>
					            </tr>
					        <?php } ?>
					    </tbody>
					</table>
				</div>

				<!--Paginação-->

				<div class="d-flex justify-content-end">
					<a type="button" class="mx-1 btn btn-secondary" href="/Laboratorio/App/View/index.php">voltar</a>
					<a class="btn btn-primary" href="adicionar.php">Adicionar</a>
				</div>
			</div>

		</div>

  		<?php include('View/Templates/footer.php') ?>
		<?php include('View/Templates/html-script.php') ?>
	</body>
</html>