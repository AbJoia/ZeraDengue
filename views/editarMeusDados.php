<?php       
     
    $userId = $_GET['userId'];    

    require_once "banco/conexao.php";          
    
    $conexao = new Conexao();
    $selectSql = "SELECT nome, sobreNome, email FROM tb_pessoa WHERE idPessoa = $userId;";
    $dado = $conexao->selectBanco($selectSql);    
    $value = mysqli_fetch_array($dado);

    $nome = $value[0];
    $sobreNome = $value[1];
    $email = $value[2];

    $selectSql = "SELECT cpf, rg FROM tb_usuario WHERE idPessoa = $userId;";
    $dado = $conexao->selectBanco($selectSql);
    $value = mysqli_fetch_array($dado);

    $cpf = $value[0];
    $rg = $value[1];

    $selectSql = "SELECT ddd, telefone FROM tb_contato WHERE pessoaidPessoa = $userId;";
    $dado = $conexao->selectBanco($selectSql);    
    $value = mysqli_fetch_array($dado);

    $ddd = $value[0];
    $telefone = $value[1];

    $selectSql = "SELECT logradouro, bairro, cidade, estado FROM tb_enderecoUsuario WHERE UsuarioPessoaIdPessoa = $userId;";
    $dado = $conexao->selectBanco($selectSql);
    $value = mysqli_fetch_array($dado);

    $endereco = $value[0];
    $bairro = $value[1];
    $cidade = $value[2];
    $estado = $value[3];

    $conexao->close();

    function Mask($mask, $str){

        $str = str_replace(" ","",$str);

        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }

        return $mask;
    }

?>

<div class="meusDados">
    <div class="TituloPagina">
        <h2>Meus Dados</h2>
    </div>
    <div id="boxEditarDados" >          
        <form class="formDados" method="POST" action="./form/formAlterarDados.php" onclick="verificar">
            <table>
                <tr>
                    <td colspan="2"><label id="f_dado">Informações Pessoais:</label></td>                        
                </tr>
                <tr>
                    <td><label id="f_dado">Cod. Usuario:</label></td>
                    <td><input id="i_dado" class="Campo" readonly="true" type="text" size="50" name="f_userId" maxlength="20" require value="<?php echo $userId ?>"></td>                    
                </tr>
                <tr>
                    <td><label id="f_dado">Nome:</label></td>
                    <td><input id="i_dado" class="Campo" readonly="true" type="text" size="50" name="f_nome" maxlength="20" require value="<?php echo $nome ?>"></td>                    
                </tr>
                <tr>
                    <td><label id="f_dado">Sobrenome:</label></td>
                    <td><input id="i_dado" class="Campo" type="text" size="50" name="f_sobreNome" maxlength="50" require value="<?php echo $sobreNome ?>"></td>
                </tr>
                <tr>
                    <td><label id="f_dado">Email:</label></td>
                    <td><input id="i_dado" class="Campo" readonly="true" type="text" size="50" name="f_email" maxlength="20" require value="<?php echo $email ?>"></td>
                </tr> 
                <tr>
                    <td><label id="f_dado">CPF:</label></td>
                    <td><input id="i_dado" class="Campo" readonly="true" type="text" size="50" name="f_cpf" maxlength="20" require value="<?php echo Mask("###.###.###-##", $cpf) ?>"></td>
                </tr> 
                <tr>
                    <td><label id="f_dado">RG:</label></td>
                    <td><input id="i_dado" class="Campo" readonly="true" type="text" size="50" name="f_rg" maxlength="20" require value="<?php echo Mask("##.###.###-#", $rg) ?>"></td>
                </tr> 
                <tr>
                    <td colspan="2"><label id="f_dado">Informações de Contato:</label></td>                        
                </tr> 
                <tr>
                    <td><label id="f_dado">DDD:</label></td>
                    <td><input id="i_dado" class="Campo" type="text" size="50" name="f_ddd" maxlength="2" require value="<?php echo Mask("(##)", $ddd) ?>"></td>
                </tr> 
                <tr>
                    <td><label id="f_dado">Telefone:</label></td>
                    <td><input id="i_dado" class="Campo" type="text" size="50" name="f_telefone" maxlength="15" require value="<?php echo Mask("####-####", $telefone) ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><label id="f_dado">Informações de Endereço:</label></td>                        
                </tr> 
                <tr>
                    <td><label id="f_dado">Endereço:</label></td>
                    <td><input id="i_dado" class="Campo" type="text" size="50" name="f_endereco" maxlength="50" require value="<?php echo $endereco ?>"></td>
                </tr> 
                <tr>
                    <td><label id="f_dado">Bairro:</label></td>
                    <td><input id="i_dado" class="Campo" type="text" size="50" name="f_bairro" maxlength="50" require value="<?php echo $bairro ?>"></td>
                </tr> 
                <tr>
                    <td><label id="f_dado">Cidade:</label></td>
                    <td><input id="i_dado" class="Campo" type="text" size="50" name="f_cidade" maxlength="50" require value="<?php echo $cidade ?>"></td>
                </tr> 
                <tr>
                    <td><label id="f_dado">Estado:</label></td>
                    <td><input id="i_dado" class="Campo" type="text" size="50" name="f_estado" maxlength="50" require value="<?php echo $estado ?>"></td>
                </tr>
                <tr></tr>
                <tr></tr> 
                <tr></tr> 
                <tr></tr> 
                <tr></tr> 
                <tr></tr> 
                <tr></tr>
                <tr></tr> 
                <tr></tr>                  
                <tr></tr> 
                <tr>                    
                    <td><input class="buttonEditarDados" id="Cancel" type="reset" value="Cancelar"></td> 
                    <td><input class="buttonEditarDados" id="Cadastre" type="submit" value="Salvar Alterações"></td>                                           
                </tr>
            </table>
        </form>  
    </div>             
</div>
</div>
</div>