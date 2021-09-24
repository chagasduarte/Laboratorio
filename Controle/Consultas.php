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
                if($con){
                    try{
                        $con->query($sql);
                        return "Cliente Adicionado com sucesso";
                    }
                    catch (Exception $e){
                        return $e;
                    }
                    
                } else {
                    return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Conexao.php";
                }
            } catch (Exception $e) {
                return $e;
            }
        }
        

    }

?>