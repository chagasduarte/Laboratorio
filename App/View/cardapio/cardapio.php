<?php 
	include('../Templates/pre_def.php');
	
	include_once('Controller/ProdutoController.php');
	$controller = new ProdutoController();
	$produtos = $controller->showCardapio();

	if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
		header("location: ../index.php");
		exit;
	}
	
?>


<!DOCTYPE html>
<html class="h-100">
	<?php include('View/Templates/html-head.php') ?>
	<body class="d-flex flex-column h-100">
		<div class="position-relative">
			<?php include('View/Templates/header.php') ?>

			<div class="row col-12 row-cols-1 row-cols-md-4 g-4 mb-5">
				<?php 
					if ($produtos->num_rows > 0) {
						while ($produto = $produtos->fetch_assoc()) {
				?>

				<div class="col">
					<div class="card">
						<img src="<?php echo $uploads.'/Produtos/'.$produto['pro_imagem'] ?>" class="card-img-top" style="object-fit: cover; height: 180px;">
						<div class="card-body" style="min-height: 100px;">
							<h6 class="card-title"><?=$produto["pro_nome"];?></h6>
							<h6>R$ <?=number_format($produto["pro_preco"], 2, ',', '.');?></h6>
						</div>
						<div class="row p-2">
							<?php if ($produto['pro_disp'] == 0) { ?>

								<div class="col-12">
									<button class="col-12 btn btn-secondary disabled">Esgotado</button>
								</div>

							<?php } else { ?>

								<div class="col-12">
									<button class="col-12 btn btn-add btn-success" data-bs-toggle="modal" data-bs-target="#addModal" data-produto="<?=$produto["pro_id"];?>">Adicionar</button>
								</div>

							<?php } ?>
						</div>
					</div>
				</div>

				<?php 
						}

						$produtos->free();
					} else {
				?>
					Nenhum produto Cadastrado!
				<?php } ?>
				
			</div>

			<div id="carrinho" class="position-fixed end-0 rounded bg-dark-orange p-2 text-white" style="bottom: 60px;">
				<div id="pedido_info" class="collapse">
					<table id="pro_tbl" class="table text-white table-striped table-hove table-bordered">
						<thead>
						    <tr class="text-left">
						    	<th scope="col">PRODUTO</th>
						        <th scope="col">VALOR</th>
						        <th scope="col">AÇÃO</th>
						    </tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>

				<div class="d-flex justify-content-between">
					<a href="#" class="text-white text-decoration-none me-3">
						<div data-bs-toggle="collapse" data-bs-target="#pedido_info" aria-expanded="false" aria-controls="pedido_info">
							Total: <span id="pedido_total">R$ 00,00</span>
							<span class="align-text-bottom">
							    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
							    	<path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
							    </svg>
							</span>
						</div>
					</a>
					<button id="finalizar_btn" class="btn btn-success p-1 d-none" onclick="finalizarPedido()">Finalizar Pedido</button>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Adicionar Produto</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						    <div class="row col-12 mb-3">
						    	<div class="col-8">
						    		<input type="hidden" name="pro_id">
						        	<div class="row mb-3">
							        	<div class="form-group col-12">
					        	      		<label>Nome</label>
					        	      		<input type="text" class="form-control text-uppercase" name="pro_nome" readonly>
					        	    	</div>
					        	    </div>
					        	    <div class="row mb-3">
					        	    	<div class="form-group col-4">
											<label>Preço</label>
											<input type="text" class="form-control" name="pro_preco" readonly>
					        	    	</div>
					        	    	<div class="form-group col-4">
					        	      		<label>Quantidade</label>
					        	      		<input type="number" class="form-control" step="1" min="1" value="1" name="pro_qtd" required>
					        	    	</div>
					        	    	<div class="form-group col-4">
											<label>Total</label>
											<input type="text" class="form-control" name="pro_total" readonly>
					        	    	</div>
					    	    	</div>
				    	    	</div>
				    	    	<div class="col-4">
				    	    		<img name="pro_imagem" class="rounded" style="width: 100%; fit: cover;">
			    	    		</div>
			    	    	</div>

				    	    <div>
				    			<table id="ing_tbl" class="table table-striped table-hove table-bordered">
				    			    <thead>
				    			        <tr class="text-left">
				    			        	<th scope="col">INGREDIENTE</th>
				    			            <th scope="col">QUANTIDADE</th>
				    			        </tr>
				    			    </thead>
				    			    <tbody></tbody>
				    			</table>
				    		</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-success" onclick="adicionarProduto()">Adicionar</button>
						</div>
					</div>
				</div>
			</div>

			<div class="d-none">
				<form id="prod_form" action="../novo_pedido.php" method="post">
				</form>
			</div>

		</div>

		<?php include('View/Templates/footer.php') ?>
		<?php include('View/Templates/html-script.php') ?>
		<script type="text/javascript">
			var produtos = [], total = 0.0, form = $('#prod_form');;

			function adicionarProduto() {
				var produto = {
					"id": $("[name='pro_id']").val(),
					"nome": $("[name='pro_nome']").val(),
					"preco": $("[name='pro_preco']").val(),
					"qtd": $("[name='pro_qtd']").val(),
					"total": $("[name='pro_total']").val()
				};

				i = produtos.length;

				form.append('<input type="text" name="produtos['+i+'][id]" value="'+produto.id+'" />');
    			form.append('<input type="text" name="produtos['+i+'][nome]" value="'+produto.nome+'" />');
    			form.append('<input type="number" step="0.01" name="produtos['+i+'][preco]" value="'+BRLtoFLOAT(produto.preco)+'" />');
    			form.append('<input type="text" name="produtos['+i+'][qtd]" value="'+produto.qtd+'" />');
    			form.append('<input type="number"  step="0.01" name="produtos['+i+'][total]" value="'+BRLtoFLOAT(produto.total)+'" />');

				total += BRLtoFLOAT(produto.total);

				produtos.push(produto);
				$(".modal").modal('toggle');
				carregarCarrinho();
				$("[data-produto='"+produto.id+"']").addClass("disabled");
				$("#finalizar_btn").removeClass("d-none");
			}

			function carregarCarrinho() {
				$("#pro_tbl > tbody").html("");
				tabela = $('#pro_tbl > tbody:last-child');

				for (i = 0; i < produtos.length; i++) {
					produto = produtos[i];

					tabela.append('<tr>\n\
						<td scope="row">'+produto.qtd+' X '+produto.nome+'</td>\n\
					    <td scope="row">'+produto.total+'</td>\n\
					    <td scope="row" class="text-center">\n\
		                	<button class="btn btn-danger py-0 px-1" onclick="removerProduto('+produto.id+')">\n\
			                	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">\n\
		  							<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>\n\
								</svg>\n\
							</button>\n\
						</td>\n\
					</tr>');
				}

				$("#pedido_total").html(total.toLocaleString("pt-BR", {style: "currency", currency:"BRL"}));
			}

			function carregarProduto(id) {
				$.ajax({
			        url: "getProduto.php",
			        type: "POST",
			        dataType: "json",
			        data: {id:id},
			        success: function (response) {
			        	var pro_preco = parseFloat(response.pro_preco).toLocaleString("pt-BR", {style: "currency", currency:"BRL"});

			        	$("[name='pro_id']").val(response.pro_id);
			        	$("[name='pro_nome']").val(response.pro_nome);
			        	$("[name='pro_qtd']").val(1);
			        	$("[name='pro_preco']").val(pro_preco);
			        	$("[name='pro_total']").val(pro_preco);
			        	$("[name='pro_imagem']").attr("src", "../../../Public/Uploads/Produtos/"+response.pro_imagem);
			        },
			        error: function(jqXHR, textStatus, errorThrown) {
			           console.log(textStatus, errorThrown);
			        }
				});
			}

			function carregarIngredientes(id) {
				$.ajax({
			        url: "getIngredientes.php",
			        type: "POST",
			        dataType: "json",
			        data: {id:id},
			        success: function (response) {
			        	for(var k in response) {
						   $('#ing_tbl > tbody:last-child').append('<tr><td scope="row">'+response[k].ing_nome+'</td><td scope="row">'+response[k].proIng_quantidade+response[k].ing_unidade+'</td></tr>');
						}
			        },
			        error: function(jqXHR, textStatus, errorThrown) {
			           console.log(textStatus, errorThrown);
			        }
				});
			}

			$(".modal").on("hidden.bs.modal", function(){
			    $("#ing_tbl > tbody").html("");
			});

			$("button.btn-add").click(function(event) {
				carregarProduto($(this).data('produto'));
				carregarIngredientes($(this).data('produto'));
			});

			$("[name='pro_qtd']").change(function(event) {
				preco = BRLtoFLOAT($("[name='pro_preco']").val());
				x = $(this).val() * preco;
				$("[name='pro_total']").val(x.toLocaleString("pt-BR", {style: "currency", currency:"BRL"}));
			});

			function BRLtoFLOAT(str) {
				parts = str.match(/(\D+)/g);
				str = str.split(parts[0]).join("");
				str = parseFloat(str.split(parts[1]).join("."));
				return str;
			}

			function removerProduto(id) {
				for (i = 0; i < produtos.length; i++)
    				if (produtos[i].id == id) {
    					total -= BRLtoFLOAT(produtos[i].total);
    					produtos.splice(i, 1);
    					$("[data-produto='"+id+"']").removeClass("disabled");
    					carregarCarrinho();
    					return;
    				}
			}

			/*
			function finalizarPedido() {
				var xmlhttp = new XMLHttpRequest();
				var url = "../novo_pedido.php";
				xmlhttp.open("POST", url);
				xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
				xmlhttp.send(JSON.stringify(produtos));
			}*/

			function finalizarPedido() {
	    		form.submit();
			}
		</script>
	</body>
</html>