<?php
    include "Controle\Consultas.php";

    class Mesa{
        private $Id;
        private $Id_Garcom;
        private $Status;
        private $Id_Pedidos;

        private function setMesa($id, $garcom, $status, $pedidos){
            $this->Id = $id;
            $this->Id_Garcom = $garcom;
            $this->Status = $status;
            $this->Id_Pedidos = $pedidos;
        }
        public function getMesa($id){
            $sql = "Select * from mesas";
            $consulta = new Consulta(); 
            $mesa = $consulta->Retorno($sql);
            return $mesa;
        }

    }

?>