		
		<?php 

			include_once('Controller/CarrosselController.php');
			$carrossel_ctl = new CarrosselController();
			$carrossel = $carrossel_ctl->showAll();

		?>

		<div id="carouselExampleCaptions" class="carousel slide mt-5 mb-5" data-bs-ride="carousel">
    		<div class="carousel-indicators">
    			<?php for ($i = 0; $i < $carrossel->num_rows; $i++) { ?>
    				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i ?>" class="<?= ($i == 0)? 'active': '' ?>"></button>
    			<?php } ?>
    		</div>
    		<div class="carousel-container">
        		<div class="carousel-inner">

        			<?php
        				$ct = 0;

        				if ($carrossel->num_rows > 0) {
        					while ($carrosel_itm = $carrossel->fetch_assoc()) {
        			?>

            		<div class="carousel-item <?= ($ct++ == 0)? 'active': '' ?>">
                		<img src="<?= $uploads.'/Carrossel/'.$carrosel_itm['itm_img'] ?>" class="img-fluid carousel-img" alt="">
                		<div class="carousel-caption">
                    		<h5><?= $carrosel_itm['itm_titulo'] ?></h5>
                    		<p><?= $carrosel_itm['itm_descricao'] ?></p>
                		</div>
            		</div>

            		<?php 
            				}

            				$carrossel->free();
            			}
            		?>
        		</div>
    		</div>

    		<a class="carousel-control-prev d-none d-lg-flex" href="#carouselExampleCaptions" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        		<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
            		<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
        		</svg>
    		</a>
    		<a class="carousel-control-next d-none d-lg-flex" href="#carouselExampleCaptions" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        		<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
            		<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
        		</svg>
    		</a>
		</div>