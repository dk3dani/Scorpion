@extends('layouts.master')

@section('content')
{{-- exibir erros--}}
@if ($errors->all())
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

@foreach ( $errors->all() as $key => $value )
  <li>{{$value}}</li>
@endforeach


    </div>
    @endif



	<card titulo="Lista de Clientes">

        <table-list
        v-bind:titulos="['#','Nome','telefone','Endereço','Bairro','Numero','Complemento','Cidade','Estado']"
        v-bind:itens="{{json_encode($listaCustomers)}}"
        ordem="desc" ordemcol="0"
          criar="#"   detalhe="customers/" editar="admin/customers/" deletar="/customers/" token="{{ csrf_token() }}"
        modal="sim"

        >


        </table-list>

    </card>
    <modal nome="meumodal" titulo="Adicionar">
        {{-- tem que dar um id ao form para relacionar ao button que esta no slot  --}}
                <formulario id="formadd" css="" action="{{route( 'customers.store'  )}}" method="post" token="{{ csrf_token() }}">
                        <div class="form-group">
                                <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" name="name" id="name"  value="{{old('name')}}" placeholder="Titulo">
                              </div>
                              <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <input type="text" class="form-control" id="phone" value="{{old('phone')}}" name="phone" placeholder="phone">
                                  </div>



                </formulario>
                {{-- button no slot deve receber o form com o id  --}}
             <span slot="addbutton">
                 <button form="formadd" class="btn btn-primary" type="submit">Adicionar</button>
            </span>

            <modal nome="editar" titulo="Editar">

                <formulario id="formEdit" v-bind:action="'#'" method="put" enctype="" token="{{ csrf_token() }}">

                  <div class="form-group">
                    <label for="title">Nome</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Nome do projeto">
                  </div>

                  <div class="form-group">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Um pouco sobre o projeto">
                  </div>

                  </formulario>
                    <span slot="addbutton">
                   <button form="formEdit" class="btn btn-primary">Editar</button>
                  </span>

            </modal>

            <modal nome="detalhe">
                    Nome
                   dois
                  </modal>








@endsection
