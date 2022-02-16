<?php
include_once("../Cad_usuario/conexao.php");

$produto = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//PESQUISA NO BANCO DE DADOS nome DO PRODUTO 
$result_prod = "SELECT * FROM produto WHERE nome LIKE '%$produto%' LIMIT 20";
$resultado_prod = mysqli_query($conn, $result_prod);

if (($resultado_prod) AND ($resultado_prod->num_rows != 0)) {
    while ($row_prod = mysqli_fetch_assoc($resultado_prod)) {
        echo "<li>" . $row_prod['nome'] . "</li>";
    }
} else {
    echo "Nenhum produto encontrado";
}
