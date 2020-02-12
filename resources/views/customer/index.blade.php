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
      v-bind:titulos="['#','Nome','CPF','Celular','Rua','Nº','Bairro','Cidade']"
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
        <input type="text" class=" cpf form-control" id="cpf" name="cpf" placeholder="ex: 000.000.000-00" value="{{old('cpf')}}">
  </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="phone">Celular</label>
        <input type="text" class=" phone form-control" id="phone" name="phone" placeholder="ex: (00) 00000-0000" value="{{old('phone')}}">
  </div>
  <div class="col-6">
    <label for="phone">Telefone</label>
    <input type="text" class=" phone form-control" id="tel" name="tel" placeholder="ex: (00)0000-0000" value="{{old('tel')}}">
  </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="street">Rua</label>
        <input type="text" class="form-control" id="street" name="street" placeholder="ex: Rua XV de Novembro" value="{{old('street')}}">
  </div>
  <div class="col-6">
    <label for="number">Numero</label>
    <input type="number" class="form-control" id="number" name="number" placeholder="ex: 456" value="{{old('number')}}">
  </div>
</div>
<div class="row mb-3 ">
    <div class="col-6">
        <label for="district">Bairro</label>
        <input type="district" class="form-control" id="district" name="district" placeholder=" ex: Primavera" value="{{old('district')}}">
  </div>
  <div class="col-6">
    <label for="city">Cidade</label>
    <input type="city" class="form-control" id="city" name="city" placeholder=" ex: Guarapuava" value="{{old('city')}}">
  </div>
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
            <input type="text" class="cpf form-control" id="cpf" name="cpf" placeholder="ex: 000.000.000-00" v-model="$store.state.item.cpf">
          </div>
          <div class="form-group">
            <label for="phone">Celular</label>
            <input type="text" class=" phone form-control" id="phone" name="phone" placeholder="ex: (00) 00000-0000" v-model="$store.state.item.phone">
          </div>
          <div class="form-group">
            <label for="street">Rua</label>
            <input type="text" class="form-control" id="street" name="street" placeholder="ex: Rua XV de Novembro" v-model="$store.state.item.street">
          </div>
          <div class="form-group">
            <label for="number">Numero</label>
            <input type="number" class="form-control" id="number" name="number" placeholder="ex: 456" v-model="$store.state.item.number">
          </div>


    </formulario>
    <span slot="addbutton">
      <button form="formEditar" class="btn btn-success">Atualizar</button>
    </span>
  </modal>
  <modal nome="detalhe" titulo="Detalhes">

  <div class="">
        <p><span class="text-bold">Rua:</span>  @{{$store.state.item.street}}</p>
        <p> <span class="text-bold">Numero:</span> @{{$store.state.item.number}}</p>
        <p> <span class="text-bold">Bairro:</span> @{{$store.state.item.district}}</p>
        <p> <span class="text-bold">Cidade:</span> @{{$store.state.item.city}}</p>
    </div>
  </modal>
@endsection
