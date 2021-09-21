<?php

    class Conexao {
        private $host = "localhost";
        private $usuario = "root";
        private $senha = "123";
        private $bd = "tecnophiles";
        private $conexao;

        private function conectaBanco(){
            try {
              mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
              $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->bd);
            }
            catch (\Exception $e){
                return $e;
            }
        }

        public function getConexao(){
            $this->conectaBanco();
            return $this->conexao;
        }
    
        
    }
    
?>