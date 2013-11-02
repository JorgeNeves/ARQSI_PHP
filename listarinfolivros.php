<?php

//Recebe como parametro o titulo,a editora desse livro,o isbn,e a indicação se o utilizador pretendia 
//que fosse apresentada a capa e o resumo imprime as informações pedidas no formato xml
$titulo = $_GET['titulo'];
$editora = $_GET['editora'];
$linkcapa = $_GET['capa'];
$resumo = $_GET['resumo'];
$isbn = $_GET['isbn'];

header("Content-Type:text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<tudo>";
//Devido aos espacos no nome do livro não era reconhecido na URL
$titulo1 = str_replace(' ', '%20', $titulo);

//Obtem as informaçoes do livro,obtendo a partir da sua editora
if ($editora == 1) {
    echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora1.php?titulo=" . $titulo1);
} else if (intval($editora) == 2) {
    echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora2.php?titulo=" . $titulo1);
} else if (intval($editora) == 3) {
    echo file_get_contents("http://phpdev2.dei.isep.ipp.pt/~i110603/editora3.php?titulo=" . $titulo1);
}
//Para obter o resumo e a capa do livro utilizou-se a API do googlebooks 
//A resposta desta API é em JSON para tal usou a função json_decode
//Embora não esteja implementada a apresentação da capa do livro,obtem-se na mesma o seu URL

$resposta = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=isbn=" . $isbn);
$resultado=  json_decode($resposta);
if($resultado->totalItems > 0){ 
    $book = $resultado->items[0];
    $resumos=$book->volumeInfo->description;
    $capa=$book->volumeInfo->imageLinks->thumbnail;
}
//Para evitar um erro caso não existisse informações do livro na base de dados da google,
//a função indica que não essa informação não existe

if ($resumo === "sim") {
    echo "<resumo>";
    if($resumos!=""){
    echo $resumos;
    }else{
        echo "Indisponível na base de dados";
    }
    echo "</resumo>";
}

//Imprime o URL da capa do livro
if ($linkcapa === "sim") {
  
  echo "<imagem>" . $capa . "</imagem>";
}

echo "</tudo>";

//Função para registar o log no servidor

require_once 'LogDAL.php';
$dal = new LogDAL();

$user = "";
$hora = date("H:i:s");
$data = date("Y-n-j");

$link = $_SERVER['SERVER_NAME'] . $_SERVER["PHP_SELF"] . "?titulo=" . $titulo1 . "&editora=" . $editora;

$sql = "INSERT INTO LOG (User, Hora,Data,Link) Values('$user','$hora','$data','$link')";

$dal->insert($sql);
?>