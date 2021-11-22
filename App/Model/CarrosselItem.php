<?php
    
	class CarrosselItem {
		private $id;
    	private $produto;
    	private $titulo;
    	private $descricao;
    	private $imagem;
    	
    	public function __construct($produto, $titulo, $descricao, $imagem){
        	$this->produto = $produto;
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
    	
    	public function getProduto(){
        	return $this->produto;
    	}
    	
    	public function setProduto($produto){
        	$this->produto = $produto;
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
