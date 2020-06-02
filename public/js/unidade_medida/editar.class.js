class Editar {

    init(elemento){
        
        let dados          = inserir.buscar_dados(elemento);
        let ret_validacoes = inserir.validacoes(dados);
    
        if(ret_validacoes.status === 'error'){
            jQuery('#mensagem-erro').html(ret_validacoes.message)
            jQuery('#modal-erro').modal('show')
            return false
        }

        this.editar(dados);
    }

    editar(dados){
        jQuery.ajax({
            type : 'PUT',
            url  : dados.url,
            data : {
                '_token'  : dados._token,                
                'dados'   : dados         
            }, success : function(ret){
                let retorno = JSON.parse(ret);

                switch(retorno.status){
                    case 'ok':
                        jQuery('#mensagem-sucesso').html('Item editado com sucesso!')
                        jQuery('#modal-sucesso').modal('show')                        
                    break;
                    case 'error':                        
                        jQuery('#mensagem-erro').html('Ocorreu um erro ao editar!')
                        jQuery('#modal-erro').modal('show')                        
                    break;
                    default:
                        jQuery('#mensagem-erro').html('Ocorreu um erro desconhecido ao editar!')
                        jQuery('#modal-erro').modal('show')                        
                    break;
                }

            }
        })
    }

}