<?php

    require_once "../banco/conexao.php";

    class Contato{

        private $ddd;
        private $telefone;                                          

        public function __construct($ddd, $telefone){
                          
            $this->ddd = $ddd;
            $this->telefone = $telefone;                                  
        } 
        
        public function getDdd(){
            return $this->ddd;
        }

        public function getTelefone(){
            return $this->telefone;
        }       

        public function __toString(){
            return $this->ddd ." ". $this->telefone;            
        }
    }
    