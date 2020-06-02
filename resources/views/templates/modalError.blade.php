<link rel="stylesheet" href="{{ url('css/main/modals.css') }}">

<div id="modal-erro" class="modal" tabindex="-1" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header bg-danger">

        <h5 class="modal-title text-center"><strong id="titulo-erro" class="text-light">Erro!</strong></h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body">
        
        <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">
            <span class="swal2-x-mark">
                <span class="swal2-x-mark-line-left"></span>
                <span class="swal2-x-mark-line-right"></span>
            </span>
        </div>

        <div id="mensagem-erro" class="text-center">            
            Ocorreu um erro ao salvar!
        </div>           

      </div>

    </div>

  </div>

</div>