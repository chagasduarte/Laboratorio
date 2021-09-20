<?php
    include "Consultas.php";
    include "ControleCliente.php";
    
    class InsercaoCliente{
        private $conexao;
        
        private function startConection(){
            $conectar = new Conexao();
            $this->conexao = $conectar->getConexao();
            return $this->conexao;
        }

        public function InserirCliente(Cliente $cliente){
           
            
            $string = "INSERT INTO `clientes`(`Id_Cliente`, `Nome`, `Data_Inscricao`, `email`, `senha`)
                       VALUES (".$cliente->getCpf().",'".$cliente->getNome()."', NOW() ,'".$cliente->GetEmail()."','".$cliente->getSenha()."')";

            $inserir = new Consulta();
            
            try {
                echo $inserir->Insercao($string);
            } catch( Exception $e){
                echo $e;
            }

        }
    }

?>