<?php
    
    include_once('Connection.php');
	include_once('Model/Funcionario.php');
    
    class FuncionarioController {
    	private $conn;
        
        public function __construct(){
            $conn = new Connection();
            $this->conn = $conn->getConnection();
        }
        
        public function insert(Funcionario $funcionario) {
        	$senha = password_hash($funcionario->getSenha(), PASSWORD_DEFAULT);
            $sql = "SELECT * FROM clientes
                    WHERE cli_email = '".$funcionario->getEmail()."'";

            if ($this->conn) {
                try{
                    $res = $this->conn->query($sql);

                    if ($res->num_rows == 0) {
                        $sql = "INSERT INTO funcionarios(fun_nome, fun_email, fun_senha, fun_funcao, fun_endereco, fun_cidade, fun_cep, fun_celular)
                                VALUES ('".mb_strtoupper($funcionario->getNome())."','".$funcionario->getEmail()."','".$senha."','".mb_strtoupper($funcionario->getFuncao())."','".mb_strtoupper($funcionario->getEndereco())."','".mb_strtoupper($funcionario->getCidade())."','".$funcionario->getCep()."','".$funcionario->getCelular()."')";
                        $this->conn->query($sql);
                        return "Funcionário adicionado com sucesso.";
                    } else {
                        return "Email já cadastrado.";
                    }
                }
                catch (Exception $e){
                    return $e;
                }
                
            } else {
                return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Connection.php.";
            }
        }
        
        public function validate(Funcionario $funcionario) {
            $sql = "SELECT * FROM funcionarios
            	    WHERE fun_email = '".$funcionario->getEmail()."'";
			
            if ($this->conn) {
                try{
                    $res = $this->conn->query($sql);
                    $row = $res->fetch_assoc();
                    
                    if ($res->num_rows > 0 && password_verify($funcionario->getSenha(), $row['fun_senha'])) {
						$_SESSION['papel'] = $row['fun_funcao'];
						$_SESSION['logado'] = true;
						$_SESSION['usuario'] = $funcionario->getEmail();
						$_SESSION['senha'] = $funcionario->getSenha();
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
