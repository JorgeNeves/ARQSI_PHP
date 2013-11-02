<?php

require_once '3editora_json.php';

$arr_editora = json_decode($json_str, true);
// verifica de o parametro é categoria e se querem todas as categorias
if ($_GET['categoria'] == "todas") {
    foreach ($arr_editora as $books) {
        foreach ($books as $book) {
            foreach ($book as $value) {
                echo "<categoria>" . $value['category'] . "</categoria>";
            }
        }
    }
}
//verifica se o parametro é categoria e se for diferente de todas faz echo dos livros daquela categoria
if (isset($_GET['categoria']) && $_GET['categoria'] != "todas") {
    foreach ($arr_editora as $books) {
        foreach ($books as $book) {
            foreach ($book as $value) {
                if ($value['category'] == $_GET['categoria']) {
                    echo "<title>" . $value['title'] . "</title>";
                    echo "<author>" . $value['author'] . "</author>";
                    echo "<category>" . $value['category'] . "</category>";
                    echo "<isbn>" . $value['isbn'] . "</isbn>";
                    echo "<publicacao>" . $value['publicacao'] . "</publicacao>";
                    echo "<news>" . $value['news'] . "</news>";
                }
            }
        }
    }
}
//verifica se o parametro é numero e faz echo do numero de livros que foi pedido
if (isset($_GET['numero'])) {
    foreach ($arr_editora as $books) {
        foreach ($books as $book) {
            for ($index = 0; $index < intval($_GET['numero']); $index++) {
                echo "<title>" . $book[$index]['title'] . "</title>";
                echo "<author>" . $book[$index]['author'] . "</author>";
                echo "<category>" . $book[$index]['category'] . "</category>";
                echo "<isbn>" . $book[$index]['isbn'] . "</isbn>";
                echo "<publicacao>" . $book[$index]['publicacao'] . "</publicacao>";
                echo "<news>" . $book[$index]['news'] . "</news>";
            }
        }
    }
}

//verifica se o parametro é titulo e faz echo dos dados do livro com aquele titulo
if (isset($_GET['titulo'])){
    $titulo1 = str_replace('%20', ' ', $_GET['titulo']);
    foreach ($arr_editora as $books) {
        foreach ($books as $book) {
            foreach ($book as $value) {
                if ($value['title'] == $titulo1) {
                    echo "<title>" . $value['title'] . "</title>";
                    echo "<author>" . $value['author'] . "</author>";
                    echo "<category>" . $value['category'] . "</category>";
                    echo "<isbn>" . $value['isbn'] . "</isbn>";
                    echo "<publicacao>" . $value['publicacao'] . "</publicacao>";
                    echo "<news>" . $value['news'] . "</news>";
                }
            }
        }
    }
}
?>

