<?php
    class FusoHorarioBrasil implements IsetFusoHOrario{

        private $setFuso;

        public function __construct($estado, $cidade){

            $this->setFuso = FusoHorarioBrasil::setFusoHorario($estado, $cidade);
        }        

        public function setFusoHorario($estado, $cidade){   

            if($estado == 'MT' || $estado == 'MS' || $estado == 'AM' || $estado == 'RR' || $estado == 'RO'){

                return 'America/Manaus';
            }
            elseif($estado == 'AC'){

                return 'America/Rio_Branco';
            }
            elseif($estado == 'PE' && $cidade == 'FERNANDO DE NORONHA'){

                return 'America/Noronha';
            }
            else{
                return 'America/Sao_Paulo'; 
            }            
        }

        public function __toString(){
            return $this->setFuso;
        }
    }
    