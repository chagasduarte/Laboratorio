<?php
    include "ControleBusca.php";

    if (isset($_POST)) {

        $concliente = new ControleCliente();
        $concliente->setCliente("","",$_POST["email"],$_POST["senha"]);
        $cliente = new Cliente();


        $consulta = new BuscaCliente();
        try {
            $cli = $consulta->BuscaCliente($concliente->getCliente());

            if ($cli->getSenha() == $_POST["senha"]){
                return 1;
            }
            else {
                return 0;
            }
        }catch(Exception $e){
            echo $e;
        }

    }
?>