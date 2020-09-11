<?php

    $userId = $_POST['f_userId'];

    $nome = $_POST['f_nome'];
    $sobreNome = $_POST['f_sobreNome'];
    $email = $_POST['f_email'];

    $cpf = $_POST['f_cpf'];
    $rg = $_POST['f_rg'];

    function RemoveMask($str){

        $str = str_replace(".","",$str);
        $str = str_replace("-", "",$str);
        $str = str_replace("(","",$str);
        $str = str_replace(")","",$str);        
        return $str;
    }

    $ddd = RemoveMask($_POST['f_ddd']);
    $telefone = RemoveMask($_POST['f_telefone']);

    $endereco = $_POST['f_endereco'];
    $bairro = $_POST['f_bairro'];
    $cidade = $_POST['f_cidade'];
    $estado = $_POST['f_estado'];    

    require_once "../banco/conexao.php";

    $conexao = new Conexao();
    $upDateSql = "UPDATE tb_pessoa SET nome = '$nome', sobreNome = '$sobreNome', email = '$email' WHERE idPessoa = $userId";
    $conexao -> upDateBanco($upDateSql);
    $upDateSql = "UPDATE tb_contato SET ddd = '$ddd', telefone = '$telefone' WHERE pessoaIdPessoa = $userId";
    $conexao -> upDateBanco($upDateSql);
    $upDateSql = "UPDATE tb_enderecousuario SET logradouro = '$endereco', bairro = '$bairro', cidade = '$cidade', estado = '$estado' WHERE UsuarioPessoaIdPessoa = $userId";
    $conexao -> upDateBanco($upDateSql);
    $conexao -> close();

    echo "<script>alert('Dados alterados com sucesso!'); window.history.back();</script>";
        