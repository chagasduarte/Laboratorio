<?php
	
    include_once('Connection.php');
	include_once('../Model/Cliente.php');
    
    class ClienteController {
    	private $conn;
        
        public function __construct(){
            $conn = new Connection();
            $this->conn = $conn->getConnection();
        }
        
        public function insert(Cliente $cliente) {
        	$senha = password_hash($cliente->getSenha(), PASSWORD_DEFAULT);
            $sql = "INSERT INTO clientes(cli_nome, cli_email, cli_senha)
                    VALUES ('".$cliente->getNome()."','".$cliente->getEmail()."','".$senha."')";
            
            echo $sql;
			
            if ($this->conn) {
                try{
                    $this->conn->query($sql);
                    return "Cliente adicionado com sucesso.";
                }
                catch (Exception $e){
                    return $e;
                }
                
            } else {
                return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Connection.php.";
            }
        }
        
        public function validate(Cliente $cliente) {
            $sql = "SELECT * FROM clientes
            	    WHERE cli_email = '".$cliente->getEmail()."'";

            if ($this->conn) {
                try{
                    $res = $this->conn->query($sql);
                    $row = $res->fetch_assoc();
                    
                    if ($res->num_rows > 0 && password_verify($cliente->getSenha(), $row['cli_senha'])) {
						$_SESSION['papel'] = 'cliente';
						$_SESSION['logado'] = true;
						$_SESSION['usuario'] = $cliente->getEmail();
						$_SESSION['senha'] = $cliente->getSenha();
                    } else {
                    	$_SESSION['logado'] = false;
                    }
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
