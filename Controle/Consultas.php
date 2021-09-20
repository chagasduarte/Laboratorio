<?php
    
    include 'conexao.php';

    class Consulta {
        
        private $conexao;
        

        private function setConexao(){
            $this->conexao = new Conexao();
        } 
        
        public function Consulta($sql){
            $this->setConexao();
            $con = $this->conexao->getConexao();
            
            $objeto = mysqli_fetch_array($con->query($sql));
            return $objeto;
        }

        public function Insercao($sql){
            try {
                $this->setConexao();
                $con = $this->conexao->getConexao();
                if($con->query($sql)){
                    return "Cliente Adicionado";
                } else {
                    return "Inseriu não, burro";
                }
            } catch (Exception $e) {
                return $e;
            }
        }
        

    }

?>