<?php

    include "../Modelo/Mesa.php";

    class controleMesa{
        private Mesa $mesa;
        
        private function setMesa($Id, $IdGarcom, $IdCliente,$IdPedidos){
            $this->mesa->Id = $Id;
            $this->mesa->IdGarcom = $IdGarcom;
            $this->mesa->IdCliente = $IdCliente;
            $this->mesa->Pedidos = $Pedidos;
        } 
        
        private function getMesa(){
            return $this->mesa;
        }
        
        public function AddMesa($data){
            $arquivo = 'Modelo/Mesa.json';
            $mesas = json_decode(file_get_contents("../Modelo/Mesa.json"),true);
            $mesas[] = $data;
    
            try {
                $file = fopen(__DIR__ . '/' . $arquivo,'w');
                $json = json_encode($mesas, JSON_PRETTY_PRINT);
                fwrite($file, $json);
                fclose($file);
    
                echo "Mesa adicionada";
            } catch(Exception $e) {
                return $e;
            }
        }

    } 



?>