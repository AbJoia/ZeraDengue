<?php

    require_once "../banco/conexao.php";

    class Endereco{

        private $logradouro;        
        private $bairro;
        private $cidade;
        private $estado;

        public function __construct($logradouro, $bairro, $cidade, $estado){
            
            $this-> logradouro = $logradouro;
            $this-> bairro = $bairro;
            $this-> cidade = $cidade;
            $this-> estado = $estado;            
        }

        public function getLogradouro(){
            return $this->logradouro;
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
    }
    