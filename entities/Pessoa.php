<?php
    require_once "../entities/Contato.php";

    abstract class Pessoa{

        protected $nome;
        protected $sobreNome;
        protected $email;
        protected $senha;
        protected $contato;
        
        public function __construct($nome, $sobreNome, $email, $senha, $contato){
            $this->nome = $nome;
            $this->sobreNome = $sobreNome;
            $this->email = $email;
            $this->senha = $senha;
            $this->contato = $contato;
        }
        
        abstract function verificarSenha($senha, $repetirSenha);
        abstract function existeDados();
        abstract function insert();
        abstract function validarEmail($mail);
    }    
