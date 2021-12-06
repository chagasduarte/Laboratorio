<?php 
    include("..\Templates\pre_def.php");
    
    $produtos = json_decode(file_get_contents("View\cardapio\cardapiolist.json"), true);
    
?>


<!DOCTYPE html>
<html class="h-100">
	<?php include('View/Templates/html-head.php') ?>
	<body class="d-flex flex-column h-100">
		<?php include('View/Templates/header.php') ?>

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php while ($lista = current($produtos)) { ?>
            <div class="col">
                <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$lista["nome"];?></h5>
                    <p>
                        <?php while ($ig = current($lista["igredientes"])) {
                            echo $ig." ";
                        
                            next($lista["igredientes"]); 
                        } ?>
                    </p>
                    <h5> R$ <?=$lista["preco"]?></h5>
                </div>
                </div>
            </div>
            <?php 
                    next($produtos);
                }
            ?>
            
        </div>


  		<?php include('View/Templates/footer.php') ?>
		<?php include('View/Templates/html-script.php') ?>
	</body>
</html>