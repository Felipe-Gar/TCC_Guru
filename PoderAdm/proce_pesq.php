<?php
session_start();
include_once("../Cad_usuario/conexao.php");

$produto = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//PESQUISA NO BANCO DE DADOS nome DO PRODUTO 
$result_prod = "SELECT * FROM produto WHERE nome LIKE '%$produto%' LIMIT 20";
$resultado_prod = mysqli_query($conn, $result_prod);

if (($resultado_prod) AND ($resultado_prod->num_rows != 0)) {
    while ($row_prod = mysqli_fetch_assoc($resultado_prod)) {
        $_SESSION['numero_caixa'] = $row_prod['numero_caixa'];

        echo "<li>" . $row_prod['nome'] . "<button name='$row_prod[quant_estoque]' id='$row_prod[nome]' class='$row_prod[numero_caixa]' onclick='emprestar(id, name, $row_prod[numero_caixa])'>+</button></li>";
    }
} else {
    echo "Nenhum produto encontrado";
}

$script = "
    <script>
       function emprestar(id, name, numero_caixa){ 
            var emprestimo = document.getElementById('emprestimo');
            var result     = document.getElementById('result');

            var tbody       = document.createElement('tbody');
            var tr          = document.createElement('tr');
            var inputHidden = document.createElement('input');
            var td          = document.createElement('td');
            var tdquan      = document.createElement('td');
            var tdempre     = document.createElement('td');
            var tdcaixa     = document.createElement('td');

            td.innerHTML      = numero_caixa;
            tdcaixa.innerHTML = id;
            tdquan.innerHTML  = '<input name=quant[] type=number value=' + name + ' readonly>';
            tdempre.innerHTML = '<input name=emprestimo[] type=number required>';
            inputHidden.type  = 'hidden';
            inputHidden.name  = 'escondido[]';
            inputHidden.value = id;

            result.appendChild(inputHidden);
            emprestimo.appendChild(tbody);
            tbody.appendChild(tr);
            tr.appendChild(td);
            tr.appendChild(tdcaixa);
            tr.appendChild(tdquan);
            tr.appendChild(tdempre);
    }
    </script>";
    
 echo $script;
 echo "";
?>
