@extends('layouts.master')

@section('content')
  <page tamanho="12">

    @if($errors->all())
      <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $key => $value)
          <li><strong>{{$value}}</strong></li>
        @endforeach
      </div>
    @endif

    <card titulo="Lista de Clientes">



      <table-list
      v-bind:titulos="['#','Nome','Rua','Bairro','Numero','Complemento','Cidade','Estado','Tipo','Tel']"
        v-bind:itens="{{json_encode($listaCustomers)}}"
      ordem="desc" ordemcol="1"
      criar="#criar" detalhe="/customers/" editar="/customers/" deletar="/customers/" token="{{ csrf_token() }}"
      modal="sim"

      ></table-list>
      <div align="center">
        {{$listaCustomers}}
      </div>
    </card>

  </page>

  <modal nome="meumodal" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('customers.store')}}" method="post" enctype="" token="{{ csrf_token() }}">

      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
      </div>
    </formulario>
    <span slot="addbutton">
      <button form="formAdicionar" class="btn btn-info">Adicionar</button>
    </span>

  </modal>
  <modal nome="editar" titulo="Editar">
    <formulario id="formEditar" v-bind:action="'/customers/'+$store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">

      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" v-model="$store.state.item.name" placeholder="Nome">
      </div>

    </formulario>
    <span slot="addbutton">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
    </span>
  </modal>
  <modal nome="detalhe" v-bind:titulo="$store.state.item.name">
    <p> olá @{{$store.state.item.phone}}</p>
  </modal>
@endsection
