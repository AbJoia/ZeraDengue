<?php

    require_once "../service/Logar.php";
    require_once "../index.php";
    
    $email = strtolower($_POST['f_login_email']);
    $senha = md5($_POST['f_login_senha']);    

    if(isset($email)||isset($senha)){

        $logar = new Logar($email, $senha);

        if($logar->logIn()){
            
            $ativo = $logar->getAtivo();
            $user = $logar->getUser();
            $userId = $logar->getId();  
                                
            header("Location: ../index.php?i=novaDenuncia&ativo=$ativo&user=$user&userId=$userId");                                                   
        }
        else{
            echo "<script> alert('Senha e/ou Email incorretos ou informações inexistentes na base de dados! Será que você já realizou um cadastro?'); history.back();</script>";
        }         
    }
    else{
        echo "<script> alert('Preencher todos os campos!');</script>";
    }  
