<?php
    
    include 'conexao.php';

    class Consulta {
        
        private $conexao;
        

        private function setConexao(){
            $this->conexao = new Conexao();
        } 
        
        public function Retorno($sql){
            $this->setConexao();
            $con = $this->conexao->getConexao();
            
            $objeto = mysqli_fetch_array($con->query($sql));
            return $objeto;
        }
        

    }

?>