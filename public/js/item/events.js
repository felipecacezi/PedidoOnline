jQuery("#btn-gravar-item").on('click', function(){
    inserir.init(this);
})

jQuery('.btn-editar').on('click', function(){
    let url = jQuery(this).attr('data-url');
    window.location.href = url;
})

jQuery('#btn-editar-item').on('click', function(){
    editar.init(this);
})

jQuery('.btn-excluir').on('click', function(){
    let url = jQuery(this).attr('data-url');
    deletar.init(url);
})