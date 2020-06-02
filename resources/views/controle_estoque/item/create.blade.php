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

    

    @if(!isset($res->item_id))
    <button id="btn-gravar-item" class="btn btn-success" data-url="{{url('/itens')}}">Gravar</button>
    @else
    <button id="btn-editar-item" class="btn btn-success" data-url="{{url('itens/'.$res->item_id)}}">Gravar</button>
    @endif
</div>

<div class="col-12"><hr/></div>
    
<form id="frm-item">
    @if(isset($res->item_id))
        @method('PUT')
    @endif   

    <div class="container">
        <div class="row">

            <div class="col-6">
                <label for="item_nome">Item</label>
                <input id="item_nome" type="text" class="form-control frm-ipt" value="{{ $res->item_nome ?? '' }}">
            </div>

            <div class="col-6">
                <label for="item_unidade_medida">Item</label>
                <select id="item_unidade_medida" class="form-control">
                    <option value="0">Selecione</option>
                    @foreach($unidades_medida as $unidade_medida)
                        <option value="{{ $unidade_medida->unidade_medida_id }}" {{ isset($res->item_unidade_medida_id) && $res->item_unidade_medida_id == $unidade_medida->unidade_medida_id ? 'selected' : '' }}>{{ $unidade_medida->unidade_medida_nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <label for="item_nome">Descrição</label>
                <textarea id="item_descricao" cols="30" rows="10" class="form-control">{{ $res->item_descricao ?? '' }}</textarea>
            </div>

        </div>
    </div>

</form>

<script src="{{ url('js/item/events.js') }}"></script>
<script src="{{ url('js/item/inserir.class.js') }}"></script>
<script src="{{ url('js/item/editar.class.js') }}"></script>
<script>
    const inserir = new Inserir;
    const editar  = new Editar;
</script>

@extends('templates.modalSuccess')
@extends('templates.modalError')
@endsection