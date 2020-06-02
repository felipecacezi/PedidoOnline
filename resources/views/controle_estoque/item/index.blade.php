@extends('templates.telaPadrao')
@extends('templates.modalSuccess')
@extends('templates.modalError')
@section('content')
    
<style>
    .w-codigo {
        width: 5%;
    }  
    .w-nome {
        width: 53%;
    }  
    .w-unidade-medida {
        width: 30%;
    }
</style>

<div class="col-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Controle Estoque</li>
            <li class="breadcrumb-item active" aria-current="page">Itens</li>
        </ol>
    </nav>
</div>

<div class="col-12"><br/></div>

<div class="col-12">
<a class="btn btn-success text-light" href="{{ url('itens/create') }}">Novo</a>
</div>

<div class="col-12"><br/></div>
    
<div class="col-12">
    <table class="table table-striped table-bordered">
        @csrf
        <thead>
            <tr>
                <th class="w-codigo">#</th>
                <th class="w-nome">Item</th>
                <th class="w-unidade-medida">Unidade de Medida</th>
                <th></th>
            </tr>            
        </thead>
        <tbody id="grd-unidade-medida">
            @foreach($itens as $item)
                <tr id="line_{{ $item->item_id }}">
                    <td>{{ $item->item_id }}</td>
                    <td>{{ $item->item_nome }}</td>
                    <td>{{ $item->unidade_medida_nome }}</td>
                    <td>
                        <button data-url="{{ url('itens/'.$item->item_id.'/edit') }}" class="btn btn-primary btn-editar"><i class="fas fa-edit"></i></button>
                        <button data-url="{{ url('itens/'.$item->item_id) }}" class="btn btn-danger btn-excluir"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>      
            @endforeach      
        </tbody>
    </table>
</div>
<script src="{{ url('./js/item/events.js') }}"></script>
<script src="{{ url('./js/item/deletar.class.js') }}"></script>
<script>
    const deletar = new Deletar;
</script>
@endsection