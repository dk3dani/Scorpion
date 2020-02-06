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
        v-bind:itens="{{json_encode($listaCustomers)}}"
      ordem="desc" ordemcol="1"
      criar="#criar" detalhe="/customers/" editar="/customers/" deletar="/customers/" token="{{ csrf_token() }}"
      modal="sim"

      ></table-list>
      <div align="center">
        {{$listaCustomers}}
      </div>
    </card>



  <modal nome="meumodal" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('customers.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
<div class="row mb-3">
    <div class="col-6">
    <label for="name">Nome</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
  </div>
  <div class="col-6">
    <label for="cpf">CPF</label>
        <input type="number" class="form-control" id="cpf" name="cpf" placeholder="cpf" value="{{old('cpf')}}">
  </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="phone">Celular</label>
        <input type="number" class="form-control" id="phone" name="phone" placeholder="phone" value="{{old('phone')}}">
  </div>
  <div class="col-6">
    <label for="phone">Telefone</label>
    <input type="number" class="form-control" id="tel" name="tel" placeholder="tel" value="{{old('tel')}}">
  </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="street">Rua</label>
        <input type="text" class="form-control" id="street" name="street" placeholder="street" value="{{old('street')}}">
  </div>
  <div class="col-6">
    <label for="number">Numero</label>
    <input type="number" class="form-control" id="number" name="number" placeholder="number" value="{{old('number')}}">
  </div>
</div>
<div class="row mb-3 ">
    <div class="col-6">
        <label for="district">Bairro</label>
        <input type="district" class="form-control" id="district" name="district" placeholder="district" value="{{old('district')}}">
  </div>
  <div class="col-6">
    <label for="city">Cidade</label>
    <input type="city" class="form-control" id="city" name="city" placeholder="city" value="{{old('city')}}">
  </div>
</div>
      <div class="form-group">
        <label for="type">Tipo</label>
        <select class="form-control" id="type" name="type">
          <option {{(old('type') && old('type') == 'N' ? 'selected' : '' )}} value="admin">Admin</option>
          <option {{(old('type') && old('type') == 'S' ? 'selected' : ''  )}} {{(!old('type') ? 'selected' : ''  )}} value="cliente">Cliente</option>
        </select>
      </div>

    </formulario>
    <span slot="addbutton">
      <button form="formAdicionar" class="btn btn-success">Adicionar</button>
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
  <modal nome="detalhe">
    <card titulo="Detalhes">

        <p> Rua: @{{$store.state.item.street}}</p>
        <p> numero: @{{$store.state.item.number}}</p>
        <p> bairro: @{{$store.state.item.district}}</p>
        <p> cidade: @{{$store.state.item.city}}</p>
    </card>
  </modal>
@endsection
