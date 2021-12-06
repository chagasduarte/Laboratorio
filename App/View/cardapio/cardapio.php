<?php 
    include('../Templates/pre_def.php');
    
    include_once('Controller/ProdutoController.php');
    $controller = new ProdutoController();
    $produtos = $controller->showCardapio();

    //$produtos = json_decode(file_get_contents("View/cardapio/cardapiolist.json"), true);
    
?>


<!DOCTYPE html>
<html class="h-100">
	<?php include('View/Templates/html-head.php') ?>
	<body class="d-flex flex-column h-100">
		<?php include('View/Templates/header.php') ?>

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php 
                if ($produtos->num_rows > 0) {
                    while ($produto = $produtos->fetch_assoc()) {
            ?>

            <div class="col">
                <div class="card">
                <img src="<?php echo $uploads.'/Produtos/'.$produto['pro_imagem'] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?=$produto["pro_nome"];?></h5>
                    <h5> R$ <?=$produto["pro_preco"]?></h5>
                    <?php 

                        if ($produto['pro_disp'] == 0) {
                            echo 'ESGOTADO!!!';
                        }

                    ?>
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


  		<?php include('View/Templates/footer.php') ?>
		<?php include('View/Templates/html-script.php') ?>
	</body>
</html>