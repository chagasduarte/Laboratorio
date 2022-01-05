<?php
    include_once('Connection.php');
	include_once('Model/Produto.php');
    include_once('Model/Ingrediente.php');
    
    class PedidoController {
        private $conn;
        
        public function __construct(){
            $conn = new Connection();
            $this->conn = $conn->getConnection();
        }
        
        public function mostrarPedidosCli($cli, $status){
            $sql = 'SELECT * FROM pedidos 
                    WHERE cli_id = '.$cli.' AND  status = '.$status.' ';
                    
            if ($this->conn) {
                try{
                    $res = $this->conn->query($sql);
                    return $res;
                }
                catch (Exception $e){
                    return $e;
                }
            } else {
                return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Connection.php.";
            }
        }


    }

?>