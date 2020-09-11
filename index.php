<?php 

    require_once "service/Logar.php";
 
    $tela = new Tela();
    $tela->get();
    
    class Tela{
          
        private $ativo = false;
        private $pagina = null;
        
        public function __construct(){                       
        }

        public function getAtivo(){
            return $this->ativo;
        }

        public function setAtivo($ativo){
            $this->ativo = $ativo;
        }

        public function getPagina(){
            return $this->pagina;
        }

        public function setPagina($pagina){
            $this->pagina = $pagina;
        }

        public function get(){

            if(isset ($_GET['i'])){
                $this->pagina = addslashes($_GET['i']);

                if(isset ($_GET['ativo'])){                    
                    $this->ativo = $_GET['ativo'];                    
                    Tela::loadMenu();
                }
                Tela::loadPagina();                                             
            }           
        }        

        public function loadMenu(){
            if(Tela::getAtivo()){
                
                include 'views/headerMenu.php';

                switch($this->pagina){
                    case 'meusDados' :
                        include 'views/meusDados.php';
                    break;

                    case 'editarMeusDados' :
                        include 'views/editarMeusDados.php';
                    break;

                    case 'excluirConta' :
                        include 'views/excluirConta.php';
                    break;
            
                    case 'minhaDenuncia' :
                        include 'views/minhaDenuncia.php';
                    break;

                    case 'detalheDenuncia' :
                        include 'views/detalheDenuncia.php';
                    break;

                    case 'novaDenuncia' :
                        include 'views/novaDenuncia.php';
                    break;
            
                    default :
                        include 'views/meusDados.php';
                    break;
                }

                include 'views/footer.php';
            }
        }
        
        public function loadPagina(){             
            
            if(!Tela::getAtivo()){

                include 'views/header.php';

                switch($this->pagina){
                    case 'login' :
                        include 'views/login.php';
                    break;
            
                    case 'cadastro' :
                        include 'views/cadastro.php';
                    break;
            
                    default :
                        include 'views/home.php';
                    break;
                }

                include 'views/footer.php';      
            }            
        }
    }        
    