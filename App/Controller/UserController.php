<?php

	include_once('Connection.php');
	include_once('ClienteController.php');
	include_once('FuncionarioController.php');
	
	class UserController {
		private $conn;
		
		public function __construct(){
            $conn = new Connection();
            $this->conn = $conn->getConnection();
        }
        
        public function login() {
        	$sql = "SELECT * FROM clientes
            	    WHERE cli_email = '".$_POST['email']."'";
           	
           	if ($this->conn) {
                try{
                    $res = $this->conn->query($sql);
                    
                    if ($res->num_rows > 0) {
                    	$cliente = new Cliente(null, null, $_POST['email'], $_POST['senha']);
                    	$cliente_ctl = new ClienteController();
                    	$cliente_ctl->validate($cliente);
                    } else {
                    	$sql = "SELECT * FROM funcionarios
            	    			WHERE fun_email = '".$_POST['email']."'";
                    	$res = $this->conn->query($sql);
                    	
                    	if ($res->num_rows > 0) {
                    		$funcionario = new Funcionario(null, null, $_POST['email'], $_POST['senha'], null, null, null, null, null);
                    		$funcionario_ctl = new FuncionarioController();
                    		$funcionario_ctl->validate($funcionario);
                    	} else {
                    		$_SESSION['logado'] = false;
                    	}
                    }
                }
                catch (Exception $e){
                    return $e;
                }
            } else {
                return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Connection.php.";
            }
		}
		
		public function register() {
        	if ($_POST['papel'] == 'cliente') {
        		$cliente = new Cliente(null, $_POST['nome'], $_POST['email'], $_POST['senha']);
        		$cliente_ctl = new ClienteController();
        		$cliente_ctl->insert($cliente);
        	} elseif ($_POST['papel'] == 'funcionario') {
        		$funcionario = new Funcionario(null, $_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['funcao'], $_POST['endereco'], $_POST['cidade'], $_POST['cep'], $_POST['celular']);
        		$funcionario_ctl = new FuncionarioController();
        		$funcionario_ctl->insert($funcionario);
        	}
		}
	}
	
?>
