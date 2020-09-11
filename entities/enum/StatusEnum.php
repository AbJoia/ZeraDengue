<?php

    abstract class StatusEnum{
        
        protected const Solicitacao_Realizada = "SOLICITACAO_REALIZADA";
        protected const Processo_Aberto = "PROCESSO_ABERTO";
        protected const Visita_Programada = "VISITA_PROGRAMADA";
        protected const Foco_Inexistente = "FOCO_INEXISTENTE";
        protected const Foco_Eliminado = "FOCO_ELIMINADO";
        protected const Responsavel_Autuado = "RESPONSAVEL_AUTUADO";
        protected const Processo_Encerrado = "PROCESSO_ENCERRADO";
        
        abstract public function setEnum($status);        
    }
    