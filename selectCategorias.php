<?php

header("Content-Type:text/xml");
echo "<?xml version=\"1.0\"?>";
echo "<tudo>";
echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora2.php?categoria=todas");
echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora1.php?categoria=todas");
echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~i110603/editora3.php?categoria=todas");
echo "</tudo>";

require_once 'LogDAL.php';
$dal = new LogDAL();

$user = "";
$hora = date("H:i:s");
$data = date("Y-n-j");

$link = "http://" .  $_SERVER['SERVER_NAME'] . $_SERVER["PHP_SELF"];

$sql = "INSERT INTO LOG (User, Hora,Data,Link) Values('$user','$hora','$data','$link')";

$dal->insert($sql);


?>
