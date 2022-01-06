<header>
    <nav class="navbar navbar-expand-lg d-block shadow-bottom p-0">
    	<div class="container-fluid p-0 bg-dark-orange">
    		<a href="/Laboratorio/App/View/index.php" class="p-2">
            	<img src="<?php echo $img?>/luigi.png" height="80px"/>
        	</a>
        	<div class="container-fluid p-0">
        		<div class="d-flex justify-content-end py-1 px-3">
            		<button class="navbar-toggler p-0 btn-red" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                		<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    		<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                		</svg>
            		</button>
                    <?php if (isset($_SESSION['logado']) && $_SESSION['logado']) { ?>
                        <span class="m-1 text-white btn bg-dark-orange" style="pointer-events: none;"><?= ($_SESSION['papel'] == 'CLIENTE')? '': $_SESSION['papel'] ?></span>
                        <a class="btn btn-orange m-1" href="/Laboratorio/App/View/login/logout.php">Sair</a>
                    <?php } else { ?>
                        <a class="btn btn-green m-1" href="/Laboratorio/App/View/clientes/registro.php" id="registrar">Registrar-se</a>
                        <a class="btn btn-orange m-1" href="/Laboratorio/App/View/login/login.php" id="login" >Fazer Login</a>
                    <?php } ?>
        		</div>
        		<div class="container-fluid navbar-light align-self-end">
            		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                		<div class="navbar-nav">

                    		<a class="nav-link <?= (isset($page) && $page == 'cardapio')? 'active': '' ?>" href="/Laboratorio/App/View/cardapio/cardapio.php" >Cardápio</a>
                    		<a class="nav-link <?= (isset($page) && $page == 'minha_conta')? 'active': '' ?>" href="/Laboratorio/App/View/index/minha_conta.php">Minha Conta</a>
                		</div>
            		</div>
          		</div>
        	</div>
        </div>
    </nav>
</header>
