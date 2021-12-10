<?php

	class Produto {
		private $id;
		private $nome;
		private $imagem;
		private $preco;
		private $disponivel;

		function __construct($id, $nome, $imagem, $preco, $disponivel){
			$this->id = $id;
			$this->nome = $nome;
			$this->imagem = $imagem;
			$this->preco = $preco;
			$this->disponivel = $disponivel;
		}

		public function getId(){
			return $this->id;
		}

		public function setId(){
			$this->id = $id;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome(){
			$this->nome = $nome;
		}

		public function getImagem(){
			return $this->imagem;
		}

		public function setImagem(){
			$this->imagem = $imagem;
		}

		public function getPreco(){
			return $this->preco;
		}

		public function setPreco(){
			$this->preco = $preco;
		}

		public function getDisponivel(){
			return $this->disponivel;
		}

		public function setDisponivel(){
			$this->disponivel = $disponivel;
		}

	}

?>
