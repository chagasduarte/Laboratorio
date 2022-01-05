<?php
    
	class Item {
		private $id;
    	private $titulo;
    	private $descricao;
    	private $imagem;
    	
    	public function __construct($id, $titulo, $descricao, $imagem){
    		$this->id = $id;
        	$this->titulo = $titulo;
        	$this->descricao = $descricao;
        	$this->imagem = $imagem;
    	}
    	
    	public function getId(){
        	return $this->id;
    	}
    	
    	public function setId($id){
        	$this->id = $id;
    	}

    	public function getTitulo(){
        	return $this->titulo;
    	}
    	
    	public function setTitulo($titulo){
        	$this->titulo = $titulo;
    	}

    	public function getDescricao(){
        	return $this->descricao;
    	}
    	
    	public function setDescricao($descricao){
        	$this->descricao = $descricao;
    	}

    	public function getImagem(){
        	return $this->imagem;
    	}
    	
    	public function setImagem($imagem){
        	$this->imagem = $imagem;
    	}
	}

?>
