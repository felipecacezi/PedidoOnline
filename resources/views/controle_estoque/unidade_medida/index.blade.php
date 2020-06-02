@extends('templates.telaPadrao')
@extends('templates.modalSuccess')
@extends('templates.modalError')
@section('content')
    
<style>
    .w-codigo {
        width: 5%;
    }  
    .w-nome {
        width: 83%;
    }  
</style>

<div class="col-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Controle Estoque</li>
            <li class="breadcrumb-item active" aria-current="page">Unidade Medida</li>
        </ol>
    </nav>
</div>

<div class="col-12"><br/></div>

<div class="col-12">
<a class="btn btn-success text-light" href="{{ url('unidade_medida/create') }}">Novo</a>
</div>

<div class="col-12"><br/></div>
    
<div class="col-12">
    <table class="table table-striped table-bordered">
        @csrf
        <thead>
            <tr>
                <th class="w-codigo">#</th>
                <th class="w-nome">Nome</th>
                <th></th>
            </tr>            
        </thead>
        <tbody id="grd-unidade-medida">
            @foreach($unidades_medida as $unidade)
                <tr id="line_{{ $unidade->unidade_medida_id }}">
                    <td>{{ $unidade->unidade_medida_id }}</td>
                    <td>{{ $unidade->unidade_medida_nome }}</td>
                    <td>
                        <button data-url="{{ url('unidade_medida/'.$unidade->unidade_medida_id.'/edit') }}" class="btn btn-primary btn-editar"><i class="fas fa-edit"></i></button>
                        <button data-url="{{ url('unidade_medida/'.$unidade->unidade_medida_id) }}" class="btn btn-danger btn-excluir"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>      
            @endforeach      
        </tbody>
    </table>
</div>
<script src="{{ url('js/unidade_medida/events.js') }}"></script>
<script src="{{ url('js/unidade_medida/deletar.class.js') }}"></script>
<script>
    let deletar = new Deletar;
</script>
@endsection