class Inserir{
    init(elemento){

        let dados = this.buscar_dados(elemento);
        this.gravar(dados);

    }

    buscar_dados (elemento){

        
        let array = {
            'produto_nome'          : jQuery('#produto_nome').val(),
            'produto_descricao'     : jQuery('#produto_descricao').val(),
            'produto_modo_preparo'  : jQuery('#produto_modo_preparo').val(),
            // 'imagem'                : jQuery("#inputFileToLoad").val(),            
            '_token'                : jQuery("[name='_token']").val(),
            'url'                   : jQuery(elemento).attr('data-url')
        }

        return array;

    }

    gravar (dados){

        jQuery.ajax({
            url  : dados.url,
            type : 'POST',
            data : {
                '_token'  : dados._token,
                'dados'   : dados         
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

    limpar_formulario(){
        jQuery("#produto_nome").val('');
        jQuery("#produto_descricao").val('');
        jQuery("#produto_modo_preparo").val('');        
    }
}