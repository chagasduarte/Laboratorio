<?php
    
	class Ingrediente {
		private $id;
    	private $nome;
    	private $quantidade;
    	private $unidade;

    	public function __construct($id, $nome, $quantidade, $unidade){
    		$this->id = $id;
        	$this->nome = $nome;
        	$this->quantidade = $quantidade;
        	$this->unidade = $unidade;
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
    	
    	public function getQuantidade(){
        	return $this->quantidade;
    	}
    	
    	public function setQuantidade($quantidade){
        	$this->quantidade = $quantidade;
    	}
    	
    	public function getUnidade(){
        	return $this->unidade;
    	}
    	
    	public function setUnidade($unidade){
        	$this->unidade = $unidade;
    	}
	}

?>
