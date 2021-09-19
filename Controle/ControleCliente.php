<?php
    include "../Modelo/Cliente.php";
    include "Controleinsercao.php";

    class ControleCliente {
        private $cliente;
        
        public function setCliente($cpf, $nome, $email, $senha){
            $cliente = new Cliente();
            $cliente->setCliente($cpf, $nome, $email, $senha);
            $this->cliente = $cliente;
        }

        public function getCliente(){
            return $this->cliente;
        }

    }
        

?>