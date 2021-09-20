<?php
    include 'Controleinsercao.php';
    
    if (isset($_POST)) {
        $cliente = new ControleCliente();
        $cliente->setCliente(preg_replace("/[^0-9]/","",$_POST["cpf"]), $_POST["nome"], $_POST["email"], $_POST["senha"]);
       
        $inserir = new InsercaoCliente();
        try {
            $inserir->InserirCliente($cliente->getCliente());
        }
        catch(Exception $e){
            echo $e;
        }
    }
?>
