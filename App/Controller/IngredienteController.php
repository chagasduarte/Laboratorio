<?php
	
    include_once('Connection.php');
	include_once('Model/Ingrediente.php');
    
    class IngredienteController {
    	private $conn;
        
        public function __construct(){
            $conn = new Connection();
            $this->conn = $conn->getConnection();
        }
        
        public function insert(Ingrediente $ingrediente) {
            $sql = "INSERT INTO ingredientes(ing_nome, ing_quantidade, ing_unidade)
                    VALUES ('".mb_strtoupper($ingrediente->getNome())."','".$ingrediente->getQuantidade()."','".$ingrediente->getUnidade()."')";

            if ($this->conn) {
                try{
                    $this->conn->query($sql);
                    return "Ingrediente adicionado com sucesso.";
                }
                catch (Exception $e){
                    return $e;
                }
            } else {
                return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Connection.php.";
            }
        }

        public function show($id) {
            $sql = "SELECT * FROM ingredientes WHERE ing_id ='".$id."'";

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
            $sql = "SELECT * FROM ingredientes";

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

        public function update(Ingrediente $ingrediente) {
            if ($ingrediente->getQuantidade() < 0) {
                $ingrediente->setQuantidade(0);
            }

            $sql = "UPDATE ingredientes
                    SET ing_nome = '".mb_strtoupper($ingrediente->getNome())."',
                        ing_quantidade = '".$ingrediente->getQuantidade()."',
                        ing_unidade = '".$ingrediente->getUnidade()."'
                    WHERE ing_id = '".$ingrediente->getId()."'";

            if ($this->conn) {
                try{
                    $this->conn->query($sql);
                    return "Ingrediente atualizado com sucesso.";
                }
                catch (Exception $e){
                    return $e;
                }
            } else {
                return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Connection.php.";
            }
        }

        public function delete($id) {
            $sql = "DELETE FROM ingredientes WHERE ing_id = '".$id."'";

            if ($this->conn) {
                try{
                    $this->conn->query($sql);
                    return "Ingrediente removido com sucesso.";
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
