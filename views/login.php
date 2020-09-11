<div class="ContainerBody">
    <div class="BoxForm">  
        <div class="Form"> 
            <img src="assets/img/cadeado.png" alt="">
            <p>Conecte-se</p>           
            <form method="post" action="./form/postFormLogin.php">
                <p><input class="Campo" type="email" size="50" name="f_login_email" placeholder="e-mail" maxlength="50" required=""></p>
                <p><input class="Campo"  type="password" size="50" name="f_login_senha" placeholder="Senha" maxlength="10" required=""></p>
                <p><input id="CheckBox" type="checkbox" name="Lembrar-me" value="true"><p id="Legenda">Mantenha-me conectado</p></p>
                <p><a href=""><input id="Login" type="submit" value="Log in"></a></p>
            </form>
            <p><a class="Info" href="">Esqueceu a senha?</a></p>
            <p id="TextInfo">Ainda não se cadastrou?<a class="Info" href="?i=cadastro"> Cadastre-se</a></p>
        </div> 
    </div>
</div>