<?php
    
    include_once('Connection.php');
	include_once('../Model/Funcionario.php');
    
    class FuncionarioController {
    	private $conn;
        
        public function __construct(){
            $conn = new Connection();
            $this->conn = $conn->getConnection();
        }
        
        public function insert(Funcionario $funcionario) {
        	$senha = password_hash($funcionario->getSenha(), PASSWORD_DEFAULT);
            $sql = "INSERT INTO `funcionarios`(`fun_nome`, `fun_email`, `fun_senha`)
                    VALUES ('".$funcionario->getNome()."','".$funcionario->getEmail()."','".$senha."')";
			
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
        
        public function validate() {
        	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $sql = "SELECT * FROM funcionarios
            	    WHERE fun_email = '".$_POST['email']."' AND fun_senha = '".$senha."'";
			
            if ($this->conn) {
                try{
                    $res = $this->conn->query($sql);
                    
                    if ($res->num_rows > 0) {
						$_SESSION['papel'] = 'funcionario';
						$_SESSION['logado'] = true;
						$_SESSION['usuario'] = $_POST['email'];
						$_SESSION['senha'] = $senha;
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
