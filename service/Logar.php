<?php     
    
    class Logar{

        private $email;
        private $senha;
        private $ativo = false;
        private $id;        

        public function __construct($email, $senha){

            $this-> email = $email;
            $this-> senha = $senha;            
        }

        public function getAtivo(){
            return $this->ativo;
        }

        public function setAtivo(){
            if($this->ativo == false){
                $this->ativo = true;
            }
            else{
                $this->ativo = false;
            }            
        }        

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getUser(){

            require_once "../banco/conexao.php";
            $conexao = new Conexao();
            $selectSql = "SELECT nome, sobreNome FROM tb_pessoa WHERE idPessoa = '$this->id';";
            $dado = $conexao->selectBanco($selectSql);
            $value = mysqli_fetch_array($dado);
            $conexao->close();                       
            return $value[0] . " " . $value[1];
        }

        public function logIn(){
            if(Logar::validarDadosAcesso()){                
                Logar::setAtivo();
                return true;
            }
            else{
                return false;
            }            
        }        

        private function validarDadosAcesso(){
                        
            require_once "../banco/conexao.php";
            $conexao = new Conexao();
            $selectSql = "SELECT idpessoa, email, senha FROM tb_pessoa WHERE email = '$this->email'";
            $dado = $conexao->selectBanco($selectSql);                      
            $value = mysqli_fetch_array($dado);    
            $conexao->close();
             
            if(@$value[2] == $this->senha){
                Logar::setId($value[0]);                              
                return true;
            }

            return false;                                                                          
        }       
    }
