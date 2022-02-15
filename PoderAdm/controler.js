$(document).ready(function() {
    $('a[data-confirm]').click(function(ev) {
        var href = $(this).attr('href');
        if (!$('#confirm_delet').lenght) {
            $('body').append('<div class="modal fade" id="confirm_delet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir item<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja excluir o item selecionado </div><div class="modal-footer"><button type="button" class="btn btn-sucess" data-dismiss="modal">Cancelar</button><a  class="btn btn-danger text-white" id="confirmar">Excluir</a></div></div></div></div>');
        }
        $('#confirmar').attr('href', href);
        $('#confirm_delet').modal({ show: true });
        return false;
    });
}); 