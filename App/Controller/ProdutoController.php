<?php
	
    include_once('Connection.php');
	include_once('Model/Produto.php');
    include_once('Model/Ingrediente.php');
    
    class ProdutoController {
    	private $conn;
        
        public function __construct(){
            $conn = new Connection();
            $this->conn = $conn->getConnection();
        }
        
        public function insert(Produto $produto) {
            $fileName = 'padrao.jpg';

            $sql = "INSERT INTO produtos(pro_nome, pro_imagem, pro_preco, pro_disponivel)
                    VALUES ('".mb_strtoupper($produto->getNome())."','".$fileName."','".$produto->getPreco()."','0')";

            if ($this->conn) {
                try{
                    $this->conn->query($sql);
                    $insert_id = $this->conn->insert_id;
                    $targetDir = "../Public/Uploads/Produtos/";
                    $targetFilePath = $targetDir.basename($_FILES["imagem"]["name"]);
                    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                    $fileName = $this->conn->insert_id.'.'.$fileType;
                    $targetFilePath = $targetDir.$fileName;
                    $allowTypes = array('jpg','png','jpeg');

                    if(in_array($fileType, $allowTypes)){
                        if(move_uploaded_file($_FILES["imagem"]["tmp_name"], $targetFilePath)){
                            $sql = "UPDATE produtos
                            SET pro_imagem = '".$fileName."'
                            WHERE pro_id = '".$this->conn->insert_id."'";
                            $this->conn->query($sql);
                        } else {
                            return "Erro ao fazer upload da imagem.";
                        }
                    } else {
                        return "Apenas os tipos jpg, jpeg e png são permitidos.";
                    }

                    return $insert_id;
                }
                catch (Exception $e){
                    return $e;
                }
            } else {
                return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Connection.php.";
            }
        }

        public function addIngrediente($pro_id, $ing_id, $proIng_quantidade) {
            $sql = "INSERT INTO produtosIngredientes(pro_id, ing_id, proIng_quantidade)
                    VALUES('".$pro_id."', '".$ing_id."', '".$proIng_quantidade."')";

            if ($this->conn) {
                try{
                    $this->conn->query($sql);
                    return "Ingrediente adicionado com sucesso!";
                }
                catch (Exception $e){
                    return $e;
                }
            } else {
                return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Connection.php.";
            }
        }

        public function deleteIngrediente($pro_id, $ing_id) {
            $sql = "DELETE FROM produtosIngredientes WHERE pro_id = '".$pro_id."' and ing_id = '".$ing_id."'";

            if ($this->conn) {
                try{
                    $this->conn->query($sql);
                    return "Ingrediente removido com sucesso!";
                }
                catch (Exception $e){
                    return $e;
                }
            } else {
                return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Connection.php.";
            }
        }

        public function showIngredientes($id) {
            $sql = "SELECT * FROM produtosIngredientes
                    INNER JOIN ingredientes
                        ON produtosIngredientes.ing_id = ingredientes.ing_id
                    WHERE pro_id = '".$id."'";

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

        public function show($id) {
            $sql = "SELECT * FROM produtos WHERE pro_id ='".$id."'";

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
            $sql = "SELECT * FROM produtos";

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

        public function showCardapio() {
            $sql = "SELECT DISTINCT produtos.*,
            CASE WHEN proIng_quantidade <= ing_quantidade
            THEN 1 ELSE 0 END as pro_disp FROM produtosIngredientes
            INNER JOIN ingredientes ON produtosIngredientes.ing_id = ingredientes.ing_id
            INNER JOIN produtos ON produtosIngredientes.pro_id = produtos.pro_id";

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

        public function update(Produto $produto) {
            if ($produto->getImagem() == null) {
                $sql = "UPDATE produtos
                        SET pro_nome = '".$produto->getNome()."',
                            pro_preco = '".$produto->getPreco()."'
                        WHERE pro_id = '".$produto->getId()."'";

                if ($this->conn) {
                    try{
                        $this->conn->query($sql);
                        return "Produto Atualizado!";
                    }
                    catch (Exception $e){
                        return $e;
                    }
                } else {
                    return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Connection.php.";
                }
            } else {
                if ($this->conn) {
                    try{
                        $targetDir = "../Public/Uploads/Produtos/";
                        $targetFilePath = $targetDir.basename($produto->getImagem()["name"]);
                        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                        $fileName = $produto->getId().'.'.$fileType;
                        $targetFilePath = $targetDir.$fileName;
                        $allowTypes = array('jpg','png','jpeg');

                        if(in_array($fileType, $allowTypes)){
                            if(file_exists($targetFilePath)) unlink($targetFilePath);
                            if(move_uploaded_file($produto->getImagem()["tmp_name"], $targetFilePath)){
                                $sql = "UPDATE produtos
                                        SET pro_nome = '".$produto->getNome()."',
                                            pro_imagem = '".$fileName."',
                                            pro_preco = '".$produto->getPreco()."'
                                        WHERE pro_id = '".$produto->getId()."'";

                                $this->conn->query($sql);
                                return "Produto Atualizado!";
                            } else {
                                return "Erro ao fazer upload da imagem.";
                            }
                        } else {
                            return "Apenas os tipos jpg, jpeg e png são permitidos.";
                        }

                        return $insert_id;
                    }
                    catch (Exception $e){
                        return $e;
                    }
                } else {
                    return "A conexão com o banco falhou, verifique as variáveis de conexão no arquivo Connection.php.";
                }

            }

        }

        public function delete($id) {
            $sql = "SELECT * FROM produtos WHERE pro_id = '".$id."'";

            if ($this->conn) {
                try{
                    $res = $this->conn->query($sql)->fetch_assoc();
                    $targetFilePath = "../Public/Uploads/Produtos/".$res['pro_imagem'];
                    
                    if(file_exists($targetFilePath)) unlink($targetFilePath);
                    
                    $sql = "DELETE FROM produtos WHERE pro_id = '".$id."'";
                    $this->conn->query($sql);
                    return "Produto removido com sucesso.";
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
