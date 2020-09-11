<?php    
    
    unset($_GET);
    $ativo = FALSE;          
    header("Location: ../index.php?i=login&ativo=$ativo");
    