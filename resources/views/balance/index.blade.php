@extends('layouts.master')

@section('content')
@if($errors->all())
<div class="alert alert-danger alert-dismissible text-center" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  @foreach ($errors->all() as $key => $value)
    <li><strong>{{$value}}</strong></li>
  @endforeach
</div>
@endif

<card cor="bg-dark" titulo="Lista de Clientes">



    <table-list
    v-bind:titulos="['#','Nome','CPF','Celular','Rua','Nº','Bairro','Cidade','Tipo']"
      v-bind:itens="{{json_encode($listBalances)}}"
    ordem="desc" ordemcol="1"
    criar="#criar" detalhe="/balances/" editar="/balances/" deletar="/balances/" token="{{ csrf_token() }}"
    modal="sim"

    ></table-list>
  
  </card>
  <modal nome="meumodal" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('customers.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
<div class="row mb-3">
    <div class="col-6">
    <label for="name">Nome</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
  </div>

</div>


    </formulario>
    <span slot="addbutton">
      <button form="formAdicionar" class="btn btn-success">Adicionar</button>
    </span>

  </modal>




@endsection


