<?php
    
    include('conexao.php');
    
    $conexao = new conexao;
    $bd = $conexao->getConexao();
    
    $consulta = "select id from mesas";
    $mesa = mysqli_fetch_array($bd->query($consulta));
    
    var_dump($mesa)

?>