<?php
    $cat = $_GET['categoria'];
    $respostaXML = "<tudo>";
    $respostaXML .=file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora2.php?categoria=" .$cat); 
    $respostaXML .=file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora1.php?categoria=" .$cat);
    $respostaXML .= "</tudo>";
    echo $respostaXML; 
?>