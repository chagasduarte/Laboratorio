<?php
    include "ControleCliente.php";
    include "Consultas.php";
    
    class BuscaCliente{
        private $conexao;
        
        private function startConection(){
            $conectar = new Conexao();
            $this->conexao = $conectar->getConexao();
            return $this->conexao;
        }

        public function BuscaCliente(Cliente $cliente){
           
            $string = "SELECT Id_Cliente, Nome, email, senha 
                       FROM clientes 
                       where email = '".$cliente->getEmail()."'";

            $con = new Consulta();
            $cli = new Cliente();

            try {
                
                $result = $con->Consulta($string);
                $cli->setCliente($result["Id_Cliente"], $result["Nome"], $result["email"], $result["senha"]);
                
                return $cli;

            } catch( Exception $e){
                echo $e;
            }

        }
    }

?>