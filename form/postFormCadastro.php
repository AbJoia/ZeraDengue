<?php 
        
    require_once "../entities/Usuario.php";
    
    $nome = strtoupper($_POST ['f_nome']);
    $sobreNome = strtoupper($_POST['f_sobrenome']);
    $email = strtolower($_POST['f_email']);    
    $senha = md5($_POST['f_senha']);
    $repetirSenha = md5($_POST['f_repetirSenha']);      
    $ddd = ($_POST['f_ddd']) ?: 'null';
    $telefone = ($_POST['f_telefone']) ?: 'null';
    $cpf = $_POST['f_cpf'];
    $rg = $_POST['f_rg'];  
    $logradouro = strtoupper($_POST['f_endereco']);    
    $bairro = strtoupper($_POST['f_bairro']);
    $cidade = strtoupper($_POST['f_cidade']);
    $estado = strtoupper($_POST['f_estado']);   

    if(Usuario::verificarSenha($senha, $repetirSenha)){
        $usuario = new Usuario($nome, $sobreNome, $email, $senha, $ddd, $telefone, $cpf, $rg, $logradouro, $bairro, $cidade, $estado);
        if($usuario->existeDados()){
            $usuario->insert();
            echo "<script>alert('Legal! :) Cadastro realizado com sucesso!'); window.location.href='http://localhost/Zera_Dengue/index.php?i=login';</script>"; 
        }
        else{
            echo "<script>alert('Email e/ou CPF e/ou RG Já Cadastrados em nossa base de dados.'); history.back(); </script>";
        }                                  
    }
    else{
        echo '<script>alert("Ops! :( As senhas digitadas não conferem!"); history.back();</script>';
    }    
        