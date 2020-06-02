@extends('templates.telaPadrao')
@section('content')
    
<style>
    .w-codigo {
        width: 5%;
    }  
    .w-nome {
        width: 83%;
    }  
    .hide {
        display : none;
    }
</style>
<link rel="stylesheet" href="{{ url('css/create_produto.css') }}">
@csrf
<div class="col-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Controle Estoque</li>
            <li class="breadcrumb-item active" aria-current="page">Itens</li>
            <li class="breadcrumb-item active" aria-current="page">Novo</li>
        </ol>
    </nav>
</div>

<div class="col-12">
    @if(!isset($res->produto_id))
        <button id="btn-gravar-item" class="btn btn-success" data-url="{{url('/produto')}}">Gravar</button>
    @else
        <button id="btn-editar-item" class="btn btn-success" data-url="{{url('produto/'.$res->produto_id)}}">Gravar</button>
    @endif
</div>

<div class="col-12"><hr/></div>
    
<form id="frm-item" enctype="multipart/form-data" >
    @if(isset($res->produto_id))
        @method('PUT')
    @endif

    <div class="container">
        <div class="row">

            <div class="col-12">
                <label for="produto_nome">Produto</label>
                <input id="produto_nome" value="{{ $res->produto_nome ?? '' }}" type="text" class="form-control frm-ipt" >
            </div>

            {{-- <div class="col-6">
                <label for="produto_imagem">Imagem</label>                                
                <input id="inputFileToLoad" type="file" class="form-control frm-ipt" />                
            </div> --}}

            <div class="col-12">
                <label for="produto_descricao">Descrição</label>
                <textarea id="produto_descricao" cols="30" rows="10" class="form-control frm-ipt">{{ $res->produto_descricao ?? '' }}</textarea>
            </div>

            <div class="col-12">
                <label for="produto_modo_preparo">Modo Preparo</label>
                <textarea id="produto_modo_preparo" cols="30" rows="10" class="form-control frm-ipt">{{ $res->produto_modo_preparo ?? '' }}</textarea>
            </div>

            {{-- <div class="col-8">
                <label for="produto_ingrediente">Ingredientes</label>                
                <select id="produto_ingrediente" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($itens as $item)
                    <option value="{{ $item->item_id }}">{{ $item->item_nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-3">
                <label for="produto_ingrediente_qtd">Qtd</label>
                <input type="text" id="produto_ingrediente_qtd" class="form-control frm-ipt">                
            </div>

            <div class="col-1 btn-add">                
                <button id="btn-add" type="button" class="btn btn-primary form-control frm-ipt">+</button>
            </div>

            <div class="col-12"><br/></div>

            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ingrediente</th>
                            <th>Quantidade</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="grd_ingredientes"></tbody>
                </table>
            </div> --}}

            
        </div>
    </div>

</form>

<script src="{{ url('js/tools/remove_acento.class.js') }}"></script>
<script src="{{ url('js/produto/events.js') }}"></script>
<script src="{{ url('js/produto/inserir.class.js') }}"></script>
<script src="{{ url('js/produto/editar.class.js') }}"></script>

<script src="{{ url('js/produto/controle_table_ingredientes.class.js') }}"></script>


<script>
    const remove_acento               = new Remove_acento;
    const inserir                     = new Inserir;
    const editar                      = new Editar;
    const controleTabelaIngredientes  = new ControleTabelaIngredientes;
    
</script>

@extends('templates.modalSuccess')
@extends('templates.modalError')
@endsection