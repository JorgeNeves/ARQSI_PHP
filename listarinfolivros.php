<?php
    $titulo = $_GET['titulo'];
    $editora= $_GET['editora'];
    header ("Content-Type:text/xml");
    echo "<?xml version=\"1.0\"?>";
    echo "<tudo>";
    $titulo1 = str_replace(' ', '%20', $titulo);
    
    if($editora==1){
        echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora1.php?titulo=".$titulo1); 
    }else{
        echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora2.php?titulo=".$titulo1); 
    }
    echo "</tudo>";
    
?>
