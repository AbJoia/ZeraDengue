<?php     

    if(verificarSenha()){
        $userId = $_POST['f_userId'];
        
        require_once "../banco/conexao.php";
        $conexao = new Conexao();
        $selectSql = "SELECT senha FROM tb_pessoa WHERE idPessoa = '$userId'";
        $dado = $conexao -> selectBanco($selectSql);
        $value = mysqli_fetch_array($dado);
        $conexao -> close();               

        if(verificarSenhaBanco($value[0])){
            executarExclusaoConta($userId);
            $ativo = FALSE;
            echo "<script>alert('Conta excluida com sucesso!'); window.location.href='http://localhost/Zera_Dengue/index.php?i=home&ativo=$ativo';</script>";            
        }
        else{
            echo "<script>alert('Senha informada não corresponde com senha cadastrada para esse usuário. Não será possivel exucutar a exclusão da conta.'); window.history.back();</script>";
        }
    }

    function verificarSenhaBanco($value){
        $senha = md5($_POST['f_senha']);        
        if($value == $senha){
            return TRUE;
        }
        else{
            return FALSE;
        }        
    }

    function verificarSenha(){
        $senha = md5($_POST['f_senha']);
        $confirmaSenha = md5($_POST['f_confirmaSenha']);

        if($senha == $confirmaSenha){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }    

    function executarExclusaoConta($userId){
               
        require_once "../banco/conexao.php";
        $conexao = new Conexao();
        $deleteSql = "DELETE FROM tb_enderecodenuncia WHERE idUsuarioPessoaIdPessoa = '$userId'";
        $conexao -> deleteBanco($deleteSql);
        $deleteSql = "DELETE FROM tb_denuncia WHERE usuarioPessoaIdPessoa = '$userId'";
        $conexao -> deleteBanco($deleteSql);
        $deleteSql = "DELETE FROM tb_enderecousuario WHERE UsuarioPessoaIdPessoa = '$userId'";
        $conexao -> deleteBanco($deleteSql);
        $deleteSql = "DELETE FROM tb_usuario WHERE idPessoa = '$userId'";
        $conexao -> deleteBanco($deleteSql);
        $deleteSql = "DELETE FROM tb_contato WHERE pessoaIdPessoa = '$userId'";
        $conexao -> deleteBanco($deleteSql);
        $deleteSql = "DELETE FROM tb_pessoa WHERE idPessoa = '$userId'";
        $conexao -> deleteBanco($deleteSql);
        $conexao -> close();                       
    }

?>