class ControleTabelaIngredientes {

    gerarArrarIngredientes(){

        let item     = jQuery('#produto_ingrediente').val();
        let itemNome = jQuery('#produto_ingrediente option:selected').text();
        let qtd      = jQuery('#produto_ingrediente_qtd').val();

        let array = {
            'item'     : item,
            'itemNome' : itemNome,
            'qtd'      : qtd
        }

        return array;

    }

    inserirIngrediente(){

        let array = this.gerarArrarIngredientes();

        let busca    = " "; 
        var strbusca = eval('/'+busca+'/g'); 

        let nomeTrim = array.itemNome.replace(strbusca, '').trim();
        let qtdTrim  = array.qtd;

        nomeTrim = remove_acento.remove(nomeTrim);

        jQuery("#grd_ingredientes").append(`<tr id="${nomeTrim+qtdTrim}">
                                                <td></td>
                                                <td>${array.itemNome}</td>
                                                <td>${array.qtd}</td>
                                                <td><button type="button" class="btn-excluir">teste</button></td>
                                            </tr>`)

    }

    removerIngrediente(elemento){
        console.log(elemento); return false;
        let linha = jQuery(elemento).attr('data-line');
        

        jQuery('#'+linha).remove();

    }

    

}