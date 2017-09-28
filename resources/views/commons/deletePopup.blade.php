@section('delete_popup')
<div id="delete_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Aviso</h4>
            </div>
            <div class="modal-body">
                <p>Tem a certeza que quer eliminar este(s) registo(s)?</p>
            </div>
            <div class="modal-footer">
                <div class="cssload-container">
                    <div class="cssload-speeding-wheel"></div>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="delete_button" class="btn btn-danger">Apagar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop
