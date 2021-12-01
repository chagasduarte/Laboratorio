<?php
    if (!isset($_SESSION)) {
		ini_set('session.save_path', '/Temp'); 
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
		session_start();
    }
	
	$css = '../../Public/css';
	$js = '../../Public/js';
	$img = '../../Public/img';
	$titulo = 'Pizzaria do Luigi';
?>

<!DOCTYPE html>
<html class="h-100">
    <?php

       include('Templates/html-head.php');
       include('Templates/header.php');
       $mesas = json_decode(file_get_contents("../Model/Mesa.json"), true);

    ?>
	<body class="d-flex flex-column h-100">    
    <div class="row row-cols-1 row-cols-md-4 g-1">
        <?php
        
            while ($mesa = current($mesas)) {
                      
        ?>
        <div class="col">
            <div class="card bg-warning">
                
                <div class="card-header"><h4><?=key($mesas);?></h4></div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">Pedidos Aqui</p>
                </div>
                <button class="btn btn-primary">adicionar pedidos</button>
            </div>
        </div>
        <?php
         next($mesas); }
        ?>
        <!-- Button trigger modal -->
        <div class="col">
            <div class="card">
                <button class="btn btn-dark text-white" data-bs-toggle="modal" data-bs-target="#AddMesa" aria-hidden="true">adicionar mesa</button>
            </div>
        </div>
        

        <!-- Modal -->
        <div class="modal fade" id="AddMesa" tabindex="-1" aria-labelledby="AddMesa">
            <div class="modal-dialog  modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddMesaLabel">Nova Mesa</h5>
                        
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <label for="IdMesa"class="col-form-label">N° Mesa:</label><input type="text" class="form-control" id="IdMesa" name="IdMesa">
                            <label for="IdCliente"class="col-form-label">Cliente:</label><input type="text" class="form-control" id="IdCliente" name="IdCliente">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="AdicionarMesa()">Adicionar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function AdicionarMesa(){
            var Mesa = 'Model/Mesa.json';
            alert(Mesa);
        }
    </script>

</body>
</html>
