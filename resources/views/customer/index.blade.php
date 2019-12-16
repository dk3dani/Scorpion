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
      ordem="asc" ordemcol="1"
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
      <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="number" class="form-control" id="cpf" name="cpf" placeholder="cpf" value="{{old('cpf')}}">
      </div>
      <div class="form-group">
        <label for="phone">Telefone</label>
        <input type="number" class="form-control" id="phone" name="phone" placeholder="phone" value="{{old('phone')}}">
      </div>
      <div class="form-group">
        <label for="street">Rua</label>
        <input type="text" class="form-control" id="street" name="street" placeholder="street" value="{{old('street')}}">
      </div>
      <div class="form-group">
        <label for="number">Numero</label>
        <input type="number" class="form-control" id="number" name="number" placeholder="number" value="{{old('number')}}">
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
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" v-model="$store.state.item.name">
          </div>
          <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="number" class="form-control" id="cpf" name="cpf" placeholder="cpf" v-model="$store.state.item.cpf">
          </div>
          <div class="form-group">
            <label for="phone">Telefone</label>
            <input type="number" class="form-control" id="phone" name="phone" placeholder="phone" v-model="$store.state.item.phone">
          </div>
          <div class="form-group">
            <label for="street">Rua</label>
            <input type="text" class="form-control" id="street" name="street" placeholder="street" v-model="$store.state.item.street">
          </div>
          <div class="form-group">
            <label for="number">Numero</label>
            <input type="number" class="form-control" id="number" name="number" placeholder="number" v-model="$store.state.item.number">
          </div>


    </formulario>
    <span slot="addbutton">
      <button form="formEditar" class="btn btn-success">Atualizar</button>
    </span>
  </modal>
  <modal nome="detalhe" v-bind:titulo="$store.state.item.name">
    <p> Cpf: @{{$store.state.item.cpf}}</p>
  </modal>
@endsection
