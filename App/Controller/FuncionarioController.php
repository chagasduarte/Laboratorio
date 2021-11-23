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

        public function show($id) {
            $sql = "SELECT * FROM funcionarios WHERE fun_id = '".$id."'";
            
            if ($this->conn) {
                try{
                    $res = $this->conn->query($sql);
                    return $res->fetch_assoc();
                }
                catch (Exception $e){
                    return $e;
                }
            } else {
                return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Connection.php.";
            }
        }

        public function showAll() {
            $sql = "SELECT * FROM funcionarios";
            
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

        public function update(Funcionario $funcionario) {
            $sql = "UPDATE funcionarios
                    SET fun_nome = '".mb_strtoupper($funcionario->getNome())."',
                        fun_email = '".mb_strtolower($funcionario->getEmail())."',
                        fun_funcao = '".mb_strtoupper($funcionario->getFuncao())."',
                        fun_endereco = '".mb_strtoupper($funcionario->getEndereco())."',
                        fun_cidade = '".mb_strtoupper($funcionario->getCidade())."',
                        fun_cep = '".$funcionario->getCep()."',
                        fun_celular = '".$funcionario->getCelular()."'
                    WHERE fun_id = '".$funcionario->getId()."'";

            if ($this->conn) {
                try{
                    $this->conn->query($sql);
                    return "Funcionario atualizado com sucesso.";
                }
                catch (Exception $e){
                    return $e;
                }
            } else {
                return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Connection.php.";
            }
        }

        public function delete($id) {
            $sql = "DELETE FROM funcionarios WHERE fun_id = '".$id."'";

            if ($this->conn) {
                try{
                    $this->conn->query($sql);
                    return "Funcionario removido com sucesso.";
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
