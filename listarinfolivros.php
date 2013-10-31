<?php

$titulo = $_GET['titulo'];
$editora = $_GET['editora'];
$linkcapa = $_GET['capa'];
$resumo = $_GET['resumo'];
$isbn = $_GET['isbn'];
header("Content-Type:text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<tudo>";
$titulo1 = str_replace(' ', '%20', $titulo);

if ($editora == 1) {
    echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora1.php?titulo=" . $titulo1);
} else if (intval($editora) == 2) {
    echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora2.php?titulo=" . $titulo1);
} else if (intval($editora) == 3) {
    echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~i110603/editora3.php?titulo=" . $titulo1);
}
$resposta = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=isbn=" . $isbn);
$resultado=  json_decode($resposta);
if($resultado->totalItems > 0){ 
    $book = $resultado->items[0];
    $resumos=$book->volumeInfo->description;
    $capa=$book->volumeInfo->imageLinks->thumbnail;
}
if ($resumo === "sim") {
    echo "<resumo>";
    if($resumos!=""){
    echo $resumos;
    }else{
        echo "Indisponível na base de dados";
    }
    echo "</resumo>";
}

if ($linkcapa === "sim") {
  
  echo "<imagem>" . $capa . "</imagem>";
}

echo "</tudo>";

require_once 'LogDAL.php';
$dal = new LogDAL();

$user = "";
$hora = date("H:i:s");
$data = date("Y-n-j");

$link = $_SERVER['SERVER_NAME'] . $_SERVER["PHP_SELF"] . "?titulo=" . $titulo1 . "&editora=" . $editora;

$sql = "INSERT INTO LOG (User, Hora,Data,Link) Values('$user','$hora','$data','$link')";

$dal->insert($sql);
?>