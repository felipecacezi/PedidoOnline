class Inserir {

    buscar_dados (elemento){
        
        let array = {
            'unidade_medida' : jQuery('#unidade_medida_nome').val(),
            '_token'         : jQuery("[name='_token']").val(),
            'url'            : jQuery(elemento).attr('data-url')
        }

        return array;

    }

    validacoes (dados){

        let retorno = {
            'status' : 'ok'
        }

        if(!dados.unidade_medida){
            retorno.status  = 'error'  
            retorno.message = '<strong class="text-danger">Atenção</strong>, o campo unidade de medida é obrigatório'
        }

        return retorno

    }

    gravar (dados){

        jQuery.ajax({
            url  : dados.url,
            type : 'POST',
            data : {
                '_token'  : dados._token,
                'dados' : dados         
            },
            success : function(ret){
                let retorno = JSON.parse(ret);
                
                switch(retorno.status){
                    case 'ok':
                        
                        inserir.limpar_formulario()
                        jQuery('#mensagem-sucesso').html('Item salvo com sucesso!')
                        jQuery('#modal-sucesso').modal('show')
                                                
                    break;
                    case 'error':

                        jQuery('#mensagem-erro').html('Ocorreu um erro ao salvar!')
                        jQuery('#modal-erro').modal('show')
                        
                    break;
                    case 'erro_unidade_medida_vazio':

                        jQuery('#mensagem-erro').html(retorno.message)
                        jQuery('#modal-erro').modal('show')
                        
                    break;                    
                    default:
                        
                        jQuery('#mensagem-erro').html('Ocorreu um erro desconhecido ao salvar!')
                        jQuery('#modal-erro').modal('show')

                    break;
                }

            }
        })

    }

    init (elemento){

        let dados = this.buscar_dados(elemento);
        let ret_validacoes = this.validacoes(dados);
    
        if(ret_validacoes.status === 'error'){
            jQuery('#mensagem-erro').html(ret_validacoes.message)
            jQuery('#modal-erro').modal('show')
            return false
        }

        this.gravar(dados);

    }

    limpar_formulario(){
        jQuery(".frm-ipt").val('');
    }

}