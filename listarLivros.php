<?php
    $cat = $_GET['categoria'];
    header ("Content-Type:text/xml");
    echo "<?xml version=\"1.0\"?>";
    echo "<tudo>";
    echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora2.php?categoria=" .$cat); 
    echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora1.php?categoria=" .$cat);
    echo "</tudo>";

?>