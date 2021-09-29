<?php
    include "ControleMesa.php";

    if (isset($_POST)){
        $data = array(
            "Mesa" => ["Id" => "$_POST[IdMesa]",
                         "Id_Garcom" =>"$_POST[IdAtendente]", 
                        "IdCli"=>"$_POST[IdCliente]",
                        "Pedido" =>["ident" => "12345",
                                       "Produt"=>[]]]
        );
        
        $controle = new ControleMesa();
        $controle->AddMesa($data);
        
    }

?>