$(function () {
    $("#pesquisa").keyup(function () {
        //Recuperar o valor do campo
        var pesquisa = $(this).val();

        //verificar se esta vazio
        if (pesquisa != '') {
            var dados = {
                palavra : pesquisa
            }
            $.post('proce_pesq.php', dados, function(retorna) {
                //Mostra dentro da ul o resultado obtidos 
                $(".resultado").html(retorna);
            });
        }
    });
});