<div class="ContainerBody">
    <div class="BoxFormCad">  
            <div class="FormCad">             
                <p>Cadastre-se</p>
                <div class="BoxLeftCad">           
                    <form method="post" action="./form/postFormCadastro.php">
                        <p><input class="Campo" type="text" size="50" name="f_nome" placeholder="Nome" maxlength="50" required=""></p>
                        <p><input class="Campo" type="text" size="50" name="f_sobrenome" placeholder="Sobrenome" maxlength="50" required=""></p>
                        <p><input class="Campo" type="email" size="50" name="f_email" placeholder="E-mail" maxlength="100" required=""></p>
                        <p><input class="Campo" type="tel" size="50" name="f_ddd" placeholder="DDD" maxlength="2"></p>
                        <p><input class="Campo" type="tel" size="50" name="f_telefone" placeholder="Numero Telefone" maxlength="13"></p>                 
                        <p><input class="Campo" type="text" size="50" name="f_cpf" placeholder="CPF" maxlength="11" required=""></p>
                        <p><input class="Campo" type="text" size="50" name="f_rg" placeholder="RG" maxlength="9" required=""></p>
                </div>
                <div class="BoxRightCad">
                        <p><input class="Campo" type="text" size="50" name="f_endereco" placeholder="Endereco" maxlength="50" required=""></p>                
                        <p><input class="Campo" type="text" size="50" name="f_bairro" placeholder="Bairro" maxlength="50" required=""></p>
                        <p><input class="Campo" type="text" size="50" name="f_cidade" placeholder="Cidade" maxlength="50" required=""></p>
                        <p><input class="Campo" type="text" size="50" name="f_estado" placeholder="Estado" maxlength="2" required=""></p>                
                        <p><input class="Campo" id="senha" type="password" size="50" name="f_senha" placeholder="Senha" maxlength="12" required=""></p>
                        <p><input class="Campo" id="repSenha" type="password" size="50" name="f_repetirSenha" placeholder="Repetir Senha" maxlength="10" required=""></p>                
                        <p><input id="Cadastre" type="submit" value="Cadastre-se"></p>
                        <p><input id="Cancel" type="reset" value="Cancelar"></p>
                </div>
                </form>            
            </div> 
        </div>
    </div>
</div>