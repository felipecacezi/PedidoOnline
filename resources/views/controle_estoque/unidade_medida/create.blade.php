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
    .hide {
        display : none;
    }
</style>
@csrf
<div class="col-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Controle Estoque</li>
            <li class="breadcrumb-item active" aria-current="page">Unidade Medida</li>
            <li class="breadcrumb-item active" aria-current="page">@if(!isset($res->unidade_medida_id))Novo @else Edição @endif</li>
        </ol>
    </nav>
</div>

<div class="col-12">
    @if(!isset($res->unidade_medida_id))
    <button id="btn-gravar-unidade-medida" class="btn btn-success" data-url="{{url('/unidade_medida')}}">Gravar</button>
    @else
    <button id="btn-editar-unidade-medida" class="btn btn-success" data-url="{{url('unidade_medida/'.$res->unidade_medida_id)}}">Gravar</button>
    @endif
</div>

<div class="col-12"><hr/></div>
    
<form id="frm-unidade-medida">
    @if(isset($res->unidade_medida_id))
        @method('PUT')
    @endif   

    <div class="col-12">
        <label for="unidade_medida_nome">Unidade de Medida</label>
        <input id="unidade_medida_nome" type="text" class="form-control frm-ipt" value="{{ $res->unidade_medida_nome ?? '' }}">
    </div>

</form>

<script src="{{ url('js/unidade_medida/events.js') }}"></script>
<script src="{{ url('js/unidade_medida/inserir.class.js') }}"></script>
<script src="{{ url('js/unidade_medida/editar.class.js') }}"></script>
<script>
    const inserir = new Inserir;
    const editar  = new Editar;
</script>

@endsection