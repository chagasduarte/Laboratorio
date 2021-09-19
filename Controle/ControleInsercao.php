<?php
    include "Consultas.php";
    
    class Insercao{
        private $conexao;
        
        private function startConection(){
            $conectar = new Conexao();
            $this->conexao = $conectar->getConexao();
            return $this->conexao;
        }

        public function InserirCliente($cpf, $nome, $email, $senha){
            $string = "INSERT INTO `clientes`(`Id_Cliente`, `Nome`, `Data_Inscricao`, `email`, `senha`) 
                VALUES ($cpf,'$nome', NOW() ,'$email','$senha')";
            
            $inserir = new Consulta();
            $inserir->Insercao($string);
            
        }
    }

    $insercao = new Insercao();
    $insercao->InserirCliente(13,'chagas','chagas@gmail.com','123');
    
    


?>