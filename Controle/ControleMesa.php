<?php

    include "../Modelo/Mesa.php";

    class controleMesa{
        private $mesa;
        private $conexao;
         
        

        public function setMesa($mesa){
            $this->mesa = new Mesa();
            $this->conexao = new Conexao(); 
            $this->mesa->setId(); 
        } 

        

    } 



?>