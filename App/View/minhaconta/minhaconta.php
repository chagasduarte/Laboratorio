<?php 
	include('../Templates/pre_def.php');
	
	include_once('Controller/PedidoController.php');
	

	// if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
	//     header("location: ../index.php");
	//  	exit;
	// }
	
?>

<!DOCTYPE html>
<html class="h-100">
    <?php include('View/Templates/html-head.php') ?>
	<body class="d-flex flex-column h-100" onload="adptar()">
		<div class="position-relative">
			<?php include('View/Templates/header.php'); ?>
            
        </div>

        <div class="container">           
            <?php
                $controller = new PedidoController();
                $pedidos = $controller->mostrarPedidosCli(2,1);

            ?>
            <!-- Tabela de pedidos em andamento -->
            <div class="table table-bordered shadow p-3 mb-5 bg-white rounded">
                <div class="table table-bordered shadow p-3 mb-5 bg-white rounded">                
                    <div class="conteiner btn btn-warning ">
                        Pedidos em Andamento
                    </div>   

                    <table class="table table-bordered">
                        <thead>
                            <th> <?=date("d/m/y");?></th>
                            <th> Pedido n°:         </th>
                            <th> Total:             </th>
                            <tr>
                                <th>Qtd.</th>
                                <th>Produto</th>
                                <th>Produto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        if ($pedidos->num_rows > 0) {
						    while ($pedido = $pedidos->fetch_assoc()) {
                        ?>
                                <th>
                                  <?=$pedido['cli_id']?>
                                </th>
                                <th>
                                <?=$pedido['cli_id']?>
                                </th>
                                <th>
                                <?=$pedido['cli_id']?>
                                </th>
                        <?php }} ?>
                            </div>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="table table-bordered shadow p-3 mb-5 bg-white rounded">                
                    <div class="conteiner btn btn-success ">
                        Histórico
                    </div>      
             
                    <table class="table table-bordered">
                        <thead>
                            <th> <?=date("d/m/y");?></th>
                            <th> Pedido n°:         </th>
                            <th> Total:             </th>
                            <tr>
                                <th>Qtd.</th>
                                <th>Produto</th>
                                <th>Produto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div >
                                <tr>

                                </tr>
                                <tr>

                                </tr>
                                <tr>

                                </tr>
                            </div>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </body>

    <script>
        function adptar(){
            document.getElementById('login').style.display = "none";
            document.getElementById('registrar').style.display = "none";
        }

    </script>

</html>