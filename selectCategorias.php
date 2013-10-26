<?php
header ("Content-Type:text/xml");
echo "<?xml version=\"1.0\"?>";
echo "<tudo>";
echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora2.php?categoria=todas"); 
echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora1.php?categoria=todas");
echo "</tudo>";

?>
