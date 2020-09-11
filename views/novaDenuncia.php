<div class="formNovaDenuncia">
                <div class="TituloPagina">
                    <h2>NOVA DENÚNCIA</h2>
                </div>
                <div class="BoxLeft">            
                    <form method="POST" action="./form/postFormNovaDenuncia.php" enctype="multipart/form-data" onsubmit ="return validarExtensaoImagem()">
                                <p><input class="Campo" type="text" size="50" name="logradouro" placeholder="Endereco" maxlength="50" required=""></p>
                                <p><input class="Campo" type="text" size="50" name="complemento" placeholder="Complemento" maxlength="50"></p>
                                <p><input class="Campo" type="text" size="50" name="bairro" placeholder="Bairro" maxlength="50" required=""></p>
                                <p><input class="Campo" type="text" size="50" name="cidade" placeholder="Cidade" maxlength="50" required=""></p>
                                <p><input class="Campo" type="text" size="50" name="estado" placeholder="Estado" maxlength="50" required=""></p>
                                <p><input class="Campo" type="hidden" size="50" name="pagina" value="?i=novaDenuncia"></p>
                                <p><input class="Campo" type="hidden" size="50" name="ativo" value="<?php echo $_GET['ativo']?>"></p>
                                <p><input class="Campo" type="hidden" size="50" name="user" value="<?php echo $_GET['user']?>"></p>
                                <p><input class="Campo" type="hidden" size="50" name="userId" value="<?php echo $_GET['userId']?>"></p>
                                                        
                                <div id="UploadArea">
                                    <div id="Label">
                                        <label>Adicione uma imagem</label>
                                    </div>
                                    <div id="Browser">                        
                                        <p><input id="inputFile" type="file" name="imagemFoco" accept="image/png, image/jpeg" multiple /></p>
                                    </div>
                                </div>    
                        </div>
                        <div class="BoxRight">                   
                            <p><textarea id="TextBox" name="descricao" placeholder="Nos conte um pouco mais sobre esse local..."
                                rows="25" cols="60" maxlength="500" required=""></textarea></p>
                                                    
                        </div>
                        <div class="ButtonArea">
                            <div class="ButtonAreaLeft">
                                <div class="ButtonNovaDenuncia">
                                    <p><input id="Cancel" type="reset" value="Cancelar"></p>
                                </div>
                            </div>
                            <div class="ButtonAreaRight">
                                <div class="ButtonNovaDenuncia">    
                                    <p><input id="Cadastre" type="submit" value="Enviar"></p>
                                </div>
                            </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
