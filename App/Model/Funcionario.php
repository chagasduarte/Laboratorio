<?php
    
	class Funcionario {
		private $id;
    	private $nome;
    	private $email;
    	private $senha;
    	private $funcao;
    	private $endereco;
    	private $cidade;
    	private $cep;
    	private $celular;

    	public function __construct($id, $nome, $email, $senha, $funcao, $endereco, $cidade, $cep, $celular){
    		$this->id = $id;
    		$this->nome = $nome;
    		$this->email = $email;
    		$this->senha = $senha;
    		$this->funcao = $funcao;
    		$this->endereco = $endereco;
    		$this->cidade = $cidade;
    		$this->cep = $cep;
    		$this->celular = $celular;
    	}
    	
    	public function getId(){
        	return $this->id;
    	}
    	
    	public function setId($id){
        	$this->id = $id;
    	}
    	
    	public function getNome(){
        	return $this->nome;
    	}
    	
    	public function setNome($nome){
        	$this->nome = $nome;
    	}
    	
    	public function getEmail(){
        	return $this->email;
    	}
    	
    	public function setEmail($email){
        	$this->email = $email;
    	}
	
    	public function getSenha(){
        	return $this->senha;
    	}
    	
    	public function setSenha($senha){
        	$this->senha = $senha;
    	}

    	public function getFuncao(){
        	return $this->funcao;
    	}
    	
    	public function setFuncao($funcao){
        	$this->funcao = $funcao;
    	}

    	public function getEndereco(){
        	return $this->endereco;
    	}
    	
    	public function setEndereco($endereco){
        	$this->endereco = $endereco;
    	}

    	public function getCidade(){
        	return $this->cidade;
    	}
    	
    	public function setCidade($cidade){
        	$this->cidade = $cidade;
    	}

    	public function getCep(){
        	return $this->cep;
    	}
    	
    	public function setCep($cep){
        	$this->cep = $cep;
    	}

    	public function getCelular(){
        	return $this->celular;
    	}
    	
    	public function setCelular($celular){
        	$this->celular = $celular;
    	}
	}

?>
