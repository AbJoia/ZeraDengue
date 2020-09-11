<?php

    class EnderecoDenuncia{

        private $logradouro;
        private $complemento;        
        private $bairro;
        private $cidade;
        private $estado;        

        public function __construct($logradouro, $complemento, $bairro, $cidade, $estado){
            
            $this-> logradouro = $logradouro;
            $this-> complemento = $complemento;
            $this-> bairro = $bairro;
            $this-> cidade = $cidade;
            $this-> estado = $estado;
        }

        public function getLogradouro(){
            return $this->logradouro;
        }

        public function getComplemento(){
            return $this->complemento;
        }

        public function getBairro(){
            return $this->bairro;
        }

        public function getCidade(){
            return $this->cidade;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function __toString(){
            return $this->logradouro
            .", ".$this->complemento
            .", ".$this->bairro
            .", ".$this->cidade
            ." - ".$this->estado;
        }
    }
    