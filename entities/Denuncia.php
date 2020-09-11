<?php

    require_once "enum/StatusProcesso.php";
    require_once "EnderecoDenuncia.php"; 
    require_once "../service/ISetFusoHorario.php";
    require_once "../service/FusoHorarioBrasil.php";       
    
    class Denuncia{

        private $status;
        private $enderecoDenuncia;
        private $dataRegistro;
        private $imgFoco;
        private $descricao;
        private $userId;        

        public function __construct($status, $logradouro, $complemento, $bairro, $cidade, $estado, $imgFoco, $descricao, $userId){           
           
            $fusoHorario = new FusoHorarioBrasil($estado, $cidade);            
            date_default_timezone_set($fusoHorario);            
            $this-> status = new StatusProcesso($status);            
            $this-> enderecoDenuncia = new EnderecoDenuncia($logradouro, $complemento, $bairro, $cidade, $estado);            
            $this-> dataRegistro = new DateTime();
            $this-> imgFoco = $imgFoco;
            $this-> descricao = $descricao;
            $this-> userId = $userId;
            Denuncia::formatarData();                                  
        }

        public function getStatus(){
            return $this->status;
        }

        public function getEnderecoDenuncia(){
            return $this->enderecoDenuncia;
        }

        public function getImgFoco(){
            return $this->imgFoco;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getUserId(){
            return $this->userId;
        }  
        
        private function formatarData(){
            $this->dataRegistro = $this->dataRegistro->format('d-m-Y H:i'); 
        }        
        
        public function insert(){

            try{ 

                $logradouro = $this->enderecoDenuncia->getLogradouro();
                $complemento = $this->enderecoDenuncia->getComplemento();
                $bairro = $this->enderecoDenuncia->getBairro();
                $cidade = $this->enderecoDenuncia->getCidade();
                $estado = $this->enderecoDenuncia->getEstado();
                
                require_once "../banco/conexao.php";
                $conexao = new Conexao();
                $insertSql = "INSERT INTO tb_denuncia (descricaoLocal, dataRegistro, foto, statusProcesso, usuarioPessoaIdPessoa)VALUES ('$this->descricao', '$this->dataRegistro', '$this->imgFoco', '$this->status', '$this->userId')";
                $conexao->insertBanco($insertSql);
                $idDenuncia = $conexao->getId();                                           
                $insertSql = "INSERT INTO tb_enderecoDenuncia (logradouro, complemento, bairro, cidade, estado, idDenuncia, idUsuarioPessoaIdPessoa)VALUES ('$logradouro', '$complemento', '$bairro', '$cidade', '$estado', '$idDenuncia','$this->userId')";
                $conexao->insertBanco($insertSql);
                $conexao->close();
                return true;                

            }catch(Exception $e)
            {
                return false;
            }
        }

        public function __toString(){
            return $this->status
            ." ".$this->enderecoDenuncia
            ." ".$this->imgFoco
            ." ".$this->descricao
            ." ".strtoupper($this->dataRegistro->format('d-M-Y H:i'));
        }        
    }
