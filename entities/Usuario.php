<?php

    require_once "../entities/Endereco.php";    
    require_once "../entities/Pessoa.php";       

    class Usuario extends Pessoa{

        private $cpf;
        Private $rg;
        private $endereco;        

        public function __construct($nome, $sobreNome, $email, $senha, $ddd, $telefone, $cpf, $rg, $logradouro, $bairro, $cidade, $estado){

            $this-> nome = $nome;
            $this-> sobreNome = $sobreNome;
            $this-> email = $email;
            $this-> senha = $senha;
            $this-> contato = new Contato($ddd, $telefone);  
            $this-> cpf = $cpf;
            $this-> rg = $rg;
            $this-> endereco = new Endereco($logradouro, $bairro, $cidade, $estado);            
        }        

        public function existeDados(){
            require_once "../banco/conexao.php";
            $conexao = new Conexao();
            $selectSql = "SELECT email FROM tb_pessoa WHERE email = '$this->email';";           
            $dado = $conexao->selectBanco($selectSql);
            $value = mysqli_fetch_array($dado);                    
                      
            if(!isset($value[0])){
                $selectSQL = "SELECT cpf FROM tb_usuario WHERE cpf = '$this->cpf';";
                $dado = $conexao->selectBanco($selectSQL);
                $value = mysqli_fetch_array($dado); 
                if(!isset($value[0])){
                    $selectSQL = "SELECT rg FROM tb_usuario WHERE rg = '$this->rg';";
                    $dado = $conexao->selectBanco($selectSQL);
                    $value = mysqli_fetch_array($dado);
                    if(!isset($value[0])){
                        $conexao->close();
                        return true;
                    }
                }
            }
            else{
                $conexao->close();
                return false;
            }
        }

        public function insert(){
            
            require_once "../banco/conexao.php";

            $ddd = $this->contato->getDdd();
            $telefone = $this->contato->getTelefone();

            $logradouro = $this->endereco->getLogradouro();
            $bairro = $this->endereco->getBairro();
            $cidade = $this->endereco->getCidade();
            $estado = $this->endereco->getEstado();
            
            $conexao = new Conexao();            
            $insertSql  = "INSERT INTO tb_pessoa (nome, sobreNome, email, senha) VALUES ('$this->nome', '$this->sobreNome', '$this->email', '$this->senha');";                                                        
            $conexao -> insertBanco($insertSql);                                
            $idPessoa = $conexao->getId();
            $insertSql = "INSERT INTO tb_usuario (cpf, rg, idPessoa) VALUES ('$this->cpf', '$this->rg', '$idPessoa');";
            $conexao -> insertBanco($insertSql);            
            $insertSql = "INSERT INTO tb_contato (ddd, telefone, pessoaIdPessoa) VALUES ('$ddd', '$telefone', '$idPessoa');";
            $conexao -> insertBanco($insertSql);
            $insertSql = "INSERT INTO tb_enderecousuario (logradouro, bairro, cidade, estado, UsuarioPessoaIdPessoa) VALUES('$logradouro', '$bairro', '$cidade', '$estado', '$idPessoa');";
            $conexao -> insertBanco($insertSql);                       
            $conexao -> close();                                                                            
        }

        public function verificarSenha($senha, $repetirSenha){

            if($senha == $repetirSenha){

                return true;
            }
            return false;
        }
        
        public function validarEmail($email){

            $para = $email;
            $assunto = "Validação de email cadastro Zer@ Dengue.";
            $corpo = "Click no link para confirmar seu email para o cadastro Zero Dengue.";
            $cabecalho = "From: zerodengue@gmail.com". "\r\n"."Reply-To: ".$email."\r\n"."X-Mailer: PHP/".phpversion();

            mail($para, $assunto, $corpo, $cabecalho);

            echo "Acesse o link no corpo do email enviado para ".$email." para confirmação.";
        }

        public function __toString(){
            return  $this->nome." ".
                    $this->sobreNome." ".
                    $this->email." ".
                    $this->senha." ".
                    $this->cpf." ".
                    $this->rg;                    
        }
    }
