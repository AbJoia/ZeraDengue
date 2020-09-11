<?php       
     
    $ativo = $_GET['ativo'];
    $user = $_GET['user'];
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
    <div class="boxDadosPessoais">
        <div class="subtitulo">
            <h3>Dados Pessoais<h3>
        </div>
            <div class="informacoes">
                <table class="TabelaMeusDados">
                    <tr>
                        <th>Nome:</th>
                        <td><?php echo $nome ?></td>                                        
                    </tr> 
                    <tr>
                        <th>Sobrenome:</th>
                        <td><?php echo $sobreNome ?></td>                                        
                    </tr>               
                    <tr>
                        <th>Email:</th>
                        <td><?php echo $email ?></td>                    
                    </tr>
                    <tr>
                        <th>CPF:</th>
                        <td><?php echo Mask("###.###.###-##", $cpf) ?></td>                                      
                    </tr>                
                    <tr>
                        <th>RG:</th>
                        <td><?php echo Mask("##.###.###-#", $rg) ?></td>                    
                    </tr>
                    <tr>
                        <th colspan="2" class="contato"><h3>Contato</h3></th>
                    </tr>
                    <tr>
                        <th>DDD:</th>
                        <td><?php echo Mask("(##)", $ddd) ?></td>                                       
                    </tr>
                    <tr>
                        <th>Telefone:</th>
                        <td><?php echo Mask("####-####", $telefone) ?></td> 
                    </tr>                              
                </table>            
            </div>        
        </div>
    <div class="boxEndereco">
        <div class="subtitulo">
            <h3>Endereço<h3>
        </div>
        <div class="informacoes">
            <table class="TabelaMeusDados">
                <tr>
                    <th>Endereço:</th>
                    <td><?php echo $endereco ?></td>                                        
                </tr> 
                <tr>
                    <th>Bairro:</th>
                    <td><?php echo $bairro ?></td>                                       
                </tr>               
                <tr>
                    <th>Cidade:</th>
                    <td><?php echo $cidade ?></td>                    
                </tr>
                <tr>
                    <th>Estado:</th>
                    <td><?php echo $estado ?></td>                    
                </tr>                                                        
            </table>
        </div>
    </div>
    <div class="ButtonArea">
        <div class="ButtonAreaLeft">
            <div class="ButtonMeusDados">
                <a href="?i=editarMeusDados&ativo=<?php echo $ativo?>&user=<?php echo $user?>&userId=<?php echo $userId?>"><button>Editar Dados</button></a>
            </div>
        </div>
        <div class="ButtonAreaRight">
            <div class="ButtonMeusDados">
                <a href="?i=excluirConta&ativo=<?php echo $ativo?>&user=<?php echo $user?>&userId=<?php echo $userId?>"><button>Excluir Conta</button></a>
            </div>
        </div>                       
    </div>           
</div>
</div>
</div>