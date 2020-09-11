<?php

      $ativo = $_GET['ativo'];
      $user = $_GET['user'];      
      $userId = $_GET['userId'];
      $idDenuncia = $_GET['idDenuncia'];      

      require_once "banco/conexao.php";

      $conexao = new Conexao();
      $selectSql = "SELECT idDenuncia, descricaoLocal, dataRegistro, foto, statusProcesso FROM tb_denuncia WHERE idDenuncia = '$idDenuncia'";
      $dado = $conexao -> selectBanco($selectSql);          
      $dadoDenuncia = array();
      $dadoEndereco = array();
      $registro = array();                           

      while($value = mysqli_fetch_array($dado)){                             
            array_push($dadoDenuncia, $value);                    
      } 
      
      foreach($dadoDenuncia as $dadoTabela){
            $idDenuncia = $dadoTabela["idDenuncia"];
            $selectSql = "SELECT logradouro, bairro, cidade, estado FROM tb_enderecoDenuncia WHERE idDenuncia = '$idDenuncia'";
            $dado = $conexao -> selectBanco($selectSql);
            $value = mysqli_fetch_array($dado);
            array_push($dadoEndereco, $value);
      }      

      for($i = 0; $i < count($dadoDenuncia); $i++){           
            $result = array_merge($dadoDenuncia[$i], $dadoEndereco[$i]);            
            array_push($registro, $result);                                                            
      }      

?>

<div class="minhaDenuncia">
      <div class="TituloPagina">
            <h2>Minhas Denúncias</h2> 
      </div>
      <div class="AreaTable">
            <div class="detalheDenunciaDados">
                  <table class="TabelaDetalheDenuncia">                  
                                          
                        <?php foreach($registro as $registro){?>
                        
                              <tr>
                                    <th>Id de Denúncia:</th>
                                    <td><?php echo $registro[0]?></td>
                              </tr>
                              <tr>
                                    <th>Status Atual:</th>
                                    <td><?php echo $registro[4]?></td>
                              </tr>
                              <tr>
                                    <th>Data Registro:</th>
                                    <td><?php echo $registro[2]?></td>
                              </tr>      
                              <tr>
                                    <th>Endereço:</th>
                                    <td><?php echo $registro[5]?></td>
                              </tr>
                              <tr>
                                    <th>Bairro:</th>
                                    <td><?php echo $registro[6]?></td>
                              </tr>
                              <tr>
                                    <th>Cidade:</th>
                                    <td><?php echo $registro[7]?></td>
                              </tr>
                              <tr>
                                    <th>Estado:</th>                        
                                    <td><?php echo $registro[8]?></td>                                               
                              </tr>
                              <tr>
                                    <td></td>
                              </tr>
                              <tr>
                                    <th>Descrição do local:</th>                                                                         
                              </tr>
                              <tr>                                    
                                    <td colspan="2" >
                                          <div class="areaTexto">
                                                <?php echo $registro[1]?>
                                          </div>
                                    </td>                                                                        
                              </tr>
                  </table>
            </div>                  
                                                   
            <div id="DetalharArea">
                  <div id="ImgBox">
                        <img src="assets/upload/<?php echo $registro[3] ?>" alt="Esta denúncia não possui imagem.">
                  </div>                                    
            </div>

            <?php }?>            
      </div>
      <div id="DetalheAreaButton" class="ButtonArea">
        <div class="ButtonAreaLeft">
            <div class="ButtonMeusDados">
                  
            </div>
        </div>
        <div class="ButtonAreaRight">
            <div class="ButtonMeusDados">
                  <a href="?i=minhaDenuncia&ativo=<?php echo $ativo?>&user=<?php echo $user?>&userId=<?php echo $userId?>"><button>Voltar</button></a>
            </div>
        </div>                       
    </div>          
</div>
</div>
</div>