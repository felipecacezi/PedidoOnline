class Deletar {

    init(url){
        if(confirm('Deseja mesmo deletar?')){
            this.deletar(url);
        } else {
            return false
        }
    }

    deletar(url){

        jQuery.ajax({
            type : 'delete',
            url  : url,
            data : {
                '_token'  : jQuery("[name='_token']").val()                               
            }, success : function(ret){
                let retorno = JSON.parse(ret);

                switch(retorno.status){
                    case 'ok':

                        jQuery("#line_"+retorno.deleted_id).remove()
                        jQuery('#mensagem-sucesso').html('Item deletado com sucesso!')
                        jQuery('#modal-sucesso').modal('show')                       
                        
                    break;
                    case 'error':

                        jQuery('#mensagem-erro').html('Erro ao deletar o item!')
                        jQuery('#modal-erro').modal('show')                       

                    break;
                    default:

                        jQuery('#mensagem-erro').html('Erro desconhecido ao deletar o item!')
                        jQuery('#modal-erro').modal('show')                       

                    break;
                }

            }
        })

    }

}