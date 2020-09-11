<?php 

    require_once "StatusEnum.php";
    
    class StatusProcesso extends StatusEnum{

        private $status;
                
        public function __construct($status){
            $statusFormat = StatusProcesso::formatar($status);
            $status = StatusProcesso::setEnum($statusFormat);
            $this->status = $status;
        }

        public function getStatus(){
            return $this->status;
        }

        public function setStatus($status){
            $this->status = $status;
        }
        
        private function formatar($status){
            $status = str_replace(" ", "_", $status);
            return strtoupper($status);
        }


        public function setEnum($status){
            switch ($status){                
                case 'PROCESSO_ABERTO':
                    return StatusEnum::Processo_Aberto;
                break;
                case 'VISITA_PROGRAMADA':
                    return StatusEnum::Visita_Programada;
                break;
                case 'FOCO_INEXISTENTE':
                    return StatusEnum::Foco_Inexistente;
                break;
                case 'FOCO_ELIMINADO':
                    return StatusEnum::Foco_Eliminado;
                break;
                case 'RESPONSAVEL_AUTUADO':
                    return StatusEnum::Responsavel_Autuado;
                break;
                case 'PROCESSO_ENCERRADO':
                    return StatusEnum::Processo_Encerrado;
                break;
                default : 
                    return StatusEnum::Solicitacao_Realizada;
                break;
            }            
        }

        public function __toString(){
            return $this->status." ";
        }
    }
    