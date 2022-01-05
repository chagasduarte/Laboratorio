<?php include('Templates/pre_def.php') ?>

<!DOCTYPE html>
<html class="h-100">
	<?php include('View/Templates/html-head.php'); ?>
	<body class="d-flex flex-column h-100">
  		<?php include('View/Templates/header.php') ?>
  		
  		<div class="container-fluid col-lg-10 p-0">
			
		<?php

			if (isset($_SESSION['logado']) && $_SESSION['logado']) {
				$_SESSION['papel'];

				if ($_SESSION['papel'] == 'CLIENTE') {
					include('View/index/cliente.php');
				} elseif ($_SESSION['papel'] == 'ADMIN') {
					include('View/index/admin.php');
				} elseif ($_SESSION['papel'] == 'ATENDENTE') {
					include('View/index/atendente.php');
				} else {
					include('View/index/gerente.php');
				}
			} else {
				include('View/index/cliente.php');
			}

		?>
    		
		
		</div>
  	
  		<?php include('View/Templates/footer.php') ?>
		<?php include('View/Templates/html-script.php') ?>
	</body>
</html>
