<?php

    require_once "../entities/Denuncia.php";    

    $logradouro = strtoupper($_POST['logradouro']);
    $complemento = strtoupper($_POST['complemento']);
    $bairro = strtoupper($_POST['bairro']);
    $cidade = strtoupper($_POST['cidade']);
    $estado = strtoupper($_POST['estado']);    
    $descricao = $_POST['descricao'];    
    $imagem = false;
    $ativo = $_POST['ativo'];
    $user = $_POST['user'];
    $userId = $_POST['userId'];
    
    if($ativo){

        if(isset($_FILES['imagemFoco'])){

            $arquivo = $_FILES['imagemFoco'];
            $extensao = strtolower(substr($_FILES['imagemFoco']['name'], -4));
            $nomeImg = md5(uniqid($arquivo['name'])) . $extensao;
            $diretorio = "../assets/upload/";
            move_uploaded_file($_FILES['imagemFoco']['tmp_name'], $diretorio . $nomeImg);
            $imagem = $nomeImg;
        }

        $denuncia = new Denuncia(null, $logradouro, $complemento, $bairro, $cidade, $estado, $imagem, $descricao, $userId);
        
        if($denuncia->insert()){
            echo "<script> alert('Denúncia realizada com sucesso. Obrigado por colaborar com a sociedade.'); window.location.href='../index.php?i=minhaDenuncia&ativo=$ativo&user=$user&userId=$userId';</script>";            
        }
        else{
            echo "<script> alert('Ops! Algo deu errado! :( . Você deve estar logado para realizar a denuncia.') history.back();</script>";
        }         
              
    }             
    