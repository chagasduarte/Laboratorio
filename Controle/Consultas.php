<?php
    
    include('conexao.php');
    
    $conexao = new conexao;
    $bd = $conexao->getConexao();
    
    $consulta = "select * from mesas";
    $mesa = $bd->query($consulta);
    



?>