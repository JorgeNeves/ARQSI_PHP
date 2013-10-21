<?php
 
$respostaXML= "<tudo>";
$respostaXML .=file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora2.php?categoria=todas"); 
$respostaXML .=file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora1.php?categoria=todas");
$respostaXML ."</tudo>";
echo $respostaXML; 

?>
