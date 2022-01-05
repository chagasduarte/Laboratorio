<?php
    
    class Pedidos {
        private $ped_id;
        private $cli_id;
        private $fun_id;
        private $mes_id; 
        private $ped_tipo;
        private $ped_data;
        private $ped_endereco;
        private $ped_cidade; 
        private $ped_cep;
        private $ped_celular; 
        private $status;

        function __construct($ped_id, $cli_id, $fun_id, $mes_id, $ped_tipo, $ped_data, $ped_endereco, $ped_cidade, $ped_cep, $ped_celular, $status) 
        {
            $this->ped_id =  $ped_id;
            $this->cli_id = $cli_id;
            $this->fun_id = $fun_id;
            $this->mes_id = $mes_id;
            $this->ped_tipo = $ped_tipo;
            $this->ped_data = $ped_data;
            $this->ped_endereco = $ped_endereco;
            $this->ped_cidade = $ped_cidade;
            $this->ped_cep = $ped_cep;
            $this->ped_celular = $ped_celular;
            $this->status = $status;
        }

        public function getPedId(){
			return $this->ped_id;
		}

		public function setPedId(){
			$this->ped_id = $ped_id;
		}
        
        public function getCliId(){
			return $this->cli_id;
		}

		public function setCliId(){
			$this->cli_id = $cli_id;
		}

        public function getFunId(){
			return $this->fun_id;
		}

		public function setFunId(){
			$this->fun_id = $fun_id;
		}
        
        public function getMesId(){
			return $this->mes_id;
		}

		public function setMesId(){
			$this->mes_id = $mes_id;
		}

        public function getPedTipo(){
			return $this->ped_tipo;
		}

		public function setPedTipo(){
			$this->ped_tipo = $ped_tipo;
		}

    }


?>