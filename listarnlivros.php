<?php
$nlivros = $_GET['nlivros'];
$editora = $_GET['neditora'];
header("Content-Type:text/xml");
echo "<?xml version=\"1.0\"?>";
echo "<tudo>";
if (intval($editora) == 1) {
    echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora1.php?numero=" . $nlivros);
} else {
    echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora2.php?numero=" . $nlivros);
}

echo "<editora>" .$editora . "</editora>";

echo "</tudo>";
?>