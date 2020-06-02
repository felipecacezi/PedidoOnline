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
<a class="btn btn-success text-light" href="{{ url('produto/create') }}">Novo</a>
</div>

<div class="col-12"><br/></div>
    
<div class="col-12">
    <table class="table table-striped table-bordered">
        @csrf
        <thead>
            <tr>
                <th class="w-codigo">#</th>
                <th class="w-nome">Produto</th>                
                <th></th>
            </tr>            
        </thead>
        <tbody id="grd-unidade-medida">
            @foreach($produtos as $produto)
                <tr id="line_{{ $produto->produto_id }}">
                    <td>{{ $produto->produto_id }}</td>
                    <td>{{ $produto->produto_nome }}</td>                    
                    <td>
                        <button data-url="{{ url('produto/'.$produto->produto_id.'/edit') }}" class="btn btn-primary btn-editar"><i class="fas fa-edit"></i></button>
                        <button data-url="{{ url('produto/'.$produto->produto_id) }}" class="btn btn-danger btn-excluir"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>      
            @endforeach      
        </tbody>
    </table>
</div>
<script src="{{ url('./js/produto/events.js') }}"></script>
<script src="{{ url('./js/produto/deletar.class.js') }}"></script>
<script>
    const deletar = new Deletar;
</script>
@endsection