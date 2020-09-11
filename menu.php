<?php 

    $pagina = 'views/meusDados.php';


    if(isset ($_GET['i'])){
        $pagina = addslashes($_GET['i']);
    } 

    include 'views/headerMenu.php';

    switch($pagina){
        case 'minhasDenuncias' :
            include 'views/minhasDenuncias.php';
        break;

        case 'novaDenuncia' :
            include 'views/novaDenuncia.php';
        break;

        default :
            include 'views/meusDados.php';
        break;
    }

    include 'views/footer.php';    

?>