<?php 

    $ativo = $_GET['ativo'];
    $user = $_GET['user'];
    $userId = $_GET['userId'];    

    echo "<script>alert('Se excluir sua conta todas as suas informações serão apagadas permanentemente, inclusive suas denúncias.Para que a ordem seja executada você precisará autenticar com sua senha de login.');</script>";
?>

<div class="meusDados">
<div id="boxEditarDados" >          
        <form class="formDados" method="POST" action="./form/formExcluirConta.php">
            <table>
                <tr>
                    <td colspan="2"><label id="f_dado">Excluir Conta:</label></td>                        
                </tr>
                <tr>
                    <td><label id="f_dado">Usuário:</label></td>
                    <td><input id="i_dado" class="Campo" readonly="true" type="text" size="50" name="f_user" maxlength="20" require value="<?php echo $user?>"></td>                    
                </tr>
                <tr>
                    <td><label id="f_dado">Cod. Usuário:</label></td>
                    <td><input id="i_dado" class="Campo" readonly="true" type="text" size="50" name="f_userId" maxlength="20" require value="<?php echo $userId?>" ></td>                    
                </tr>
                <tr>
                    <td><label id="f_dado">Senha:</label></td>
                    <td><input id="i_dado" class="Campo" type="password" size="50" name="f_senha" maxlength="20" require="" ></td>                    
                </tr>
                <tr>
                    <td><label id="f_dado">Confirmar Senha:</label></td>
                    <td><input id="i_dado" class="Campo" type="password" size="50" name="f_confirmaSenha" maxlength="20" require="" ></td>                    
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
                    <td><input class="buttonEditarDados" id="Cadastre" type="submit" value="Excluir Conta"></td>                                           
                </tr>
            </table>
        </form>  
    </div>             
</div>
</div>
</div>