<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico"/>
    <script src="assets/js/script.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Anton|Baloo+Bhai+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">    
    <title>Zer@ Dengue - Menu Usuário</title>
</head>
<body>
    <header>    
        <nav>                  
            <div class="BarraMenu">
                <div class="BoxMenu">
                    <div class="MenuLeft">
                        <a href=""><img src="assets/img/ZeroDengue.png" alt=""></a>
                    </div>
                    <div class="MenuRight">
                        <ul>
                            <li class="Usuario">Usuário: <?php echo $_GET['user']?></li>                            
                        </ul>
                    </div>
                </div>
            </div>
        </nav>      
    </header>
    <div class="ContainerBody">
        <div class="BoxFormMenu">  
            <div class="FormMenu">             
                <p>Menu</p>                                            
                <a href="?i=meusDados&ativo=<?php echo $_GET['ativo']?>&user=<?php echo $_GET['user']?>&userId=<?php echo $_GET['userId']?>"><button class="BotaoMenu">Meus Dados</button></a>
                <a href="?i=minhaDenuncia&ativo=<?php echo $_GET['ativo']?>&user=<?php echo $_GET['user']?>&userId=<?php echo $_GET['userId']?>"><button class="BotaoMenu">Minhas denúncias</button></a>
                <a href="?i=novaDenuncia&ativo=<?php echo $_GET['ativo']?>&user=<?php echo $_GET['user']?>&userId=<?php echo $_GET['userId']?>"><button class="BotaoMenu">Nova denúncia</button></a>                
                <a href="./form/formLogOut.php?ativo=<?php echo $_GET['ativo']?>&user=<?php echo $_GET['user']?>&userId=<?php echo $_GET['userId']?>"><button class="BotaoMenu">Sair</button></a>           
            </div>
            
    