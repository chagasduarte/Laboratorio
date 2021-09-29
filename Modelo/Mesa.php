<?php
    include "../Controle/Consultas.php";

    class Mesa{
        private $Id;
        private $IdGarcom;
        private $IdCliente;
        private $Pedidos;

        public function setId($Id){
            $this->Id = $Id;
        }        
        public function getId(){
            return $this->Id;
        }

        public function setIdGarcom($IdGarcom){
            $this->IdGarcom = $IdGarcom;
        }        
        public function getIdGarcom(){
            return $this->IdGarcom;
        }

        public function setStatus($Status){
            $this->Status = $Status;
        }        
        public function getStatus(){
            return $this->Status;
        }

        public function setIdCliente($IdCliente){
            $this->IdCliente = $IdCliente;
        }        
        public function getIdCliente(){
            return $this->IdCliente;
        }

        public function setPedidos($Pedidos){
            $this->Pedidos = $Pedidos;
        }        
        public function getPedidos(){
            return $this->Pedidos;
        }

    }

?>