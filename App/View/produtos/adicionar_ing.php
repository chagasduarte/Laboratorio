<?php include('../Templates/pre_def.php') ?>

<?php

	if (!isset($_SESSION['logado']) || !$_SESSION['logado'] || $_SESSION['papel'] != 'ADMIN') {
		header("location: ../index.php");
		exit;
	}

	include_once('Controller/ProdutoController.php');
	include_once('Controller/IngredienteController.php');
	$pro_controller = new ProdutoController();
	$ing_controller = new IngredienteController();

	if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
		$produto = $pro_controller->show($_GET['id']);
		$ingredientes = $ing_controller->showAll();
		$pro_ing = $pro_controller->showIngredientes($_GET['id']);
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
			        <h4>Editar Ingredientes</h4>
			    </div>

			    <div class="row col-12 mb-3">
			    	<div class="col-8">
			        	<div class="row mb-3">
				        	<div class="form-group col-12">
		        	      		<label>Nome</label>
		        	      		<input type="text" class="form-control text-uppercase" name="nome" value="<?php echo $produto['pro_nome'] ?>" readonly>
		        	    	</div>
		        	    </div>
		        	    <div class="row mb-3">
		        	    	<div class="form-group col-4">
		        	      		<label>Código</label>
		        	      		<input type="number" class="form-control" name="id" value="<?php echo $produto['pro_id'] ?>" readonly>
		        	    	</div>
		        	    	<div class="form-group col-8">
								<label>Preço</label>
								<input type="number" class="form-control" step="0.01" name="preco" value="<?php echo $produto['pro_preco'] ?>" readonly>
		        	    	</div>
		    	    	</div>
	    	    	</div>
	    	    	<div class="col-4">
	    	    		<img class="rounded" src="<?php echo $uploads.'/Produtos/'.$produto['pro_imagem'] ?>" style="width: 100%; fit: cover;">
    	    		</div>
    	    	</div>

	    	    <div>
	    			<table class="table table-striped table-hove table-bordered">
	    			    <thead>
	    			        <tr class="text-left">
	    			        	<th scope="col">CÓDIGO</th>
	    			        	<th scope="col">NOME</th>
	    			            <th scope="col">QUANTIDADE</th>
	    			            <th scope="col" class="text-center">AÇÃO</th>
	    			        </tr>
	    			    </thead>
	    			    <tbody>
	    			        <?php 
	    			        	if ($pro_ing->num_rows > 0) {
	    			        		while ($ingrediente = $pro_ing->fetch_assoc()) {
	    			        ?>
	    			            <tr class="text-left">
	    			                <td scope="row"><?php echo $ingrediente['ing_id'] ?></td>
	    			                <td scope="row"><?php echo $ingrediente['ing_nome'] ?></td>
	    			                <td scope="row"><?php echo $ingrediente['proIng_quantidade']." ".$ingrediente['ing_unidade'] ?></td>
	    			                <td class="text-center">
	    			                	<button class="btn btn-danger py-0 px-1" onclick="deleteIngrediente(<?= $produto['pro_id'] ?>, <?= $ingrediente['ing_id'] ?>)">
	    				                	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
	    			  							<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
	    									</svg>
	    								</button>
	    			                </td>
	    			            </tr>
	    			        <?php 
	    			        		}

	    			        		$pro_ing->free();
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

	    		<form onSubmit="addIngrediente(); return false">
	    			<div class="row align-items-end mb-4">
	    				<input type="hidden" name="pro_id" value="<?php echo $produto['pro_id'] ?>">
			        	<div class="form-group col-5">
	        	      		<label>Ingrediente</label>
	        	      		<select name="ing_id" class="form-select" onChange="carregarIngrediente(this.value)" required>
	        	      		  	<option value="" selected>Selecione</option>
	        	      		  	<?php 
	        	      		  		while ($i = $ingredientes->fetch_assoc()) {
	        	      		  	?>
	        	      		  	<option value="<?php echo $i['ing_id'] ?>"><?php echo $i['ing_id']." - ".$i['ing_nome']?></option>
	        	      		  	<?php 
	        	      		  		}

	        	      		  		$ingredientes->free();
	        	      		  	?>
	        	      		</select>
	        	    	</div>
	        	    	<div class="form-group col-3">
	        	      		<label>Quantidade</label>
	        	      		<input type="number" class="form-control" min="0" name="quantidade" readonly required>
	        	    	</div>
	        	    	<div class="form-group col-3">
	        	      		<label>Unidade</label>
	        	      		<input id="unidade" type="text" class="form-control" readonly>
	        	    	</div>
	        	    	<div class="d-flex form-group col-1 justify-content-end">
		        	      	<button type="submit" class="btn btn-success">
		        	      		+
		        	      	</button>
		    	    	</div>
	    	    	</div>
	    		</form>

    	    	<div class="d-flex justify-content-end">
        	      	<a class="btn btn-success" href="listar.php">Concluir</a>
    	    	</div>
			</div>

		</div>

  		<?php include('View/Templates/footer.php') ?>
		<?php include('View/Templates/html-script.php') ?>

		<script type="text/javascript">
			function carregarIngrediente(id) {
				if (id == "") {
					$("form").trigger("reset");
					$("[name='quantidade']").attr("readonly", true);
				} else {
					$.ajax({
				        url: "getIngrediente.php",
				        type: "POST",
				        dataType: "json",
				        data: {id:id},
				        success: function (response) {
				        	$("#unidade").val(response.ing_unidade);
				        	$("[name='quantidade']").attr("readonly", false);

				        	if (response.ing_unidade == "und" ||
				        		response.ing_unidade == "ml" ||
				        		response.ing_unidade == "g") {
				        		$("[name='quantidade']").attr("step", 1);
				        	} else {
				        		$("[name='quantidade']").attr("step", 0.01);
				        	}
				        },
				        error: function(jqXHR, textStatus, errorThrown) {
				           console.log(textStatus, errorThrown);
				        }
				    });
				}
			}

			function deleteIngrediente(pro_id, ing_id) {
				var data = {'pro_id': pro_id, 'ing_id': ing_id};
				
			    $.post('deleteIngrediente.php', data, 
			        function(response){
			        	location.reload();
			            console.log(response);
			        }
			    );
			}

			function addIngrediente() {
				$.ajax({
			        url: "setIngrediente.php",
			        type: "POST",
			        data: $("form").serialize(),
			        success: function (response) {
			        	location.reload();
			        	console.log(response);
			        },
			        error: function(jqXHR, textStatus, errorThrown) {
			           console.log(textStatus, errorThrown);
			        }
			    });
			}
		</script>
	</body>
</html>