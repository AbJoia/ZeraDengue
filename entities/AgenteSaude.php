<?php

    class AgenteSaude extends Pessoa{

        private $matricula;

        public function __construct($nome, $sobreNome, $email, $senha, $contato, $matricula){ 
                       
            $this-> nome = $nome;
            $this-> sobreNome = $sobreNome;
            $this-> email = $email;
            $this-> senha = $senha;
            $this-> contato = $contato;
            $this-> matricula = $matricula;
        }
    }
    