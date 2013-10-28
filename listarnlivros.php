<?php
$nlivros = $_GET['nlivros'];
$editora = $_GET['neditora'];
header("Content-Type:text/xml");
echo "<?xml version=\"1.0\"?>";
echo "<tudo>";
if (intval($editora) == 1) {
    echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora1.php?numero=" . $nlivros);
}else if(intval($editora) == 2) {
    echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora2.php?numero=" . $nlivros);
}else if(intval($editora) == 3){
    echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~i110603/editora3.php?numero=" . $nlivros);
}
echo "<editora>" .$editora . "</editora>";
echo "</tudo>";


    require_once 'LogDAL.php';
    $dal = new LogDAL();

    $user = "";
    $hora = date("H:i:s");
    $data = date("Y-n-j");

    $link = $_SERVER['SERVER_NAME'] . $_SERVER["PHP_SELF"] . "?neditora=" . $editora . "&nlivros=" . $nlivros;

    $sql = "INSERT INTO LOG (User, Hora,Data,Link) Values('$user','$hora','$data','$link')";

    $dal->insert($sql);
?>