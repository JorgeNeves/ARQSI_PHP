<?php
    $nlivros = $_GET['nlivros'];
    $editora = $_GET['neditora'];
    
    $respostaXML = "<tudo>";
    if(intval($editora)==1){
    $respostaXML .=file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora1.php?numero=".$nlivros); 
    }else{
    $respostaXML .=file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora2.php?numero=" .$nlivros);
    }
    $respostaXML .= "</tudo>";
    echo $respostaXML; 
?>