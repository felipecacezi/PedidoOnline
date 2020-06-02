<link rel="stylesheet" href="{{ url('css/main/modals.css') }}">

<div id="modal-sucesso" class="modal" tabindex="-1" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header bg-success">

        <h5 class="modal-title text-center"><strong id="titulo-sucesso" class="text-light">Sucesso!</strong></h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body">

        
        <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
            <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
            <span class="swal2-success-line-tip"></span>
            <span class="swal2-success-line-long"></span>
            <div class="swal2-success-ring"></div> 
            <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
            <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>            
        </div>

        <div id="mensagem-sucesso" class="text-center">            
            Dados salvos com sucesso!
        </div>           

      </div>

    </div>

  </div>

</div>