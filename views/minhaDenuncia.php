<?php

      $ativo = $_GET['ativo'];
      $user = $_GET['user'];
      $userId = $_GET['userId'];      

      require_once "banco/conexao.php";

      $conexao = new Conexao();
      $selectSql = "SELECT idDenuncia, dataRegistro, statusProcesso FROM tb_denuncia WHERE usuarioPessoaIdPessoa = '$userId'";
      $dado = $conexao -> selectBanco($selectSql);
       
?>

<div class="minhaDenuncia">
      <div class="TituloPagina">
            <h2>Minhas Denúncias</h2> 
      </div>
      <div class="AreaTable">
            <table class="TabelaDenuncia">
                  <tr>
                        <th colspan="4">Denúncias Ativas</th>
                  </tr>
                  <tr>
                        <th>Código de Denúncia</th>
                        <th>Data de Registro</th> 
                        <th>Status Atual do Processo</th>
                                                                      
                        
                  </tr>                  
                  <?php while($value = mysqli_fetch_array($dado)){?>
                  <tr>
                        <?php $idDenuncia = $value[0];?>
                        <td><?php echo $value[0]?></td>
                        <td><?php echo $value[1]?></td>
                        <td><?php echo $value[2]?></td>                        
                        <td><a href="?i=detalheDenuncia&ativo=<?php echo $ativo?>&user=<?php echo $user?>&userId=<?php echo $userId?>&idDenuncia=<?php echo $idDenuncia?>"><button>Exibir Denúncia</button><a></td>                                               
                  </tr>                                   
                  <?php }
                        $conexao->close();
                  ?>                                 
            </table>
      </div>          
</div>
</div>
</div>