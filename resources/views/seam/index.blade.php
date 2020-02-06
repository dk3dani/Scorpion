@extends('layouts.master')

@section('content')


    @if($errors->all())
    <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $key => $value)
        <li><strong>{{$value}}</strong></li>
        @endforeach
    </div>
    @endif

    <card titulo="Costuras" cor="bg-dark">
        <table-list v-bind:titulos="['#','Cliente','Produto','Descrição','Valor']"
            v-bind:itens="{{json_encode($listSeams)}}" ordem="desc" ordemcol="1" criar="#criar" detalhe="/seams/"
            editar="/seams/" deletar="/seams/" token="{{ csrf_token() }}" modal="sim"></table-list>
        <div align="center">
            {{$listSeams}}
        </div>
    </card>



<modal nome="meumodal" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('seams.store')}}" method="post" enctype=""
        token="{{ csrf_token() }}">
        <div class="row mb-3">
            <div class="col-6">
                <label for="product">Produto</label>
                <input type="text" class="form-control" id="product" name="product" placeholder="Produto"
                    value="{{old('product')}}">
            </div>
            <div class="col-6"  style=" ">
                <label for="customer_id">Clientes</label>
                <select class="ls-select" name="customer_id"  id="nameid">
                    <option></option>

                    @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" name="description" placeholder="description"
                    value="{{old('description')}}" rows="1"></textarea>
            </div>
            <div class="col-6">
                <label for="price">Valor</label>
                <input type="text" class=" money form-control" id="price" name="price" placeholder="price"
                    value="{{old('price')}}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="scale">Medidas</label>
                <input type="text" class="form-control" id="scale" name="scale" placeholder="scale"
                    value="{{old('street')}}">
            </div>
            <div class="col-6">
                <label for="paid">Pago</label>
                <input type="checkbox" id="paid" name="paid" placeholder="Pago"
                    value="{{old('paid')}}">
            </div>
        </div>
        <div class="row mb-3 ">
            <div class="col-6">
                <label for="count_clothes">Quantidade de peças</label>
                <input type="text" class="form-control" id="count_clothes" name="count_clothes" placeholder="count_clothes"
                    value="{{old('count_clothes')}}">
            </div>
            <div class="col-6">
                <label for="type">Tipo</label>
                <input type="text" class="form-control" id="type" name="type" placeholder="type"
                    value="{{old('type')}}">
            </div>
        </div>
        <div class="row mb-3 ">
            <div class="col-6">
                <label for="date_in">Data de entrada</label>
                <input type="date" class="form-control" id="date_in" name="date_in" placeholder="date_in"
                    value="{{old('date_in')}}">
            </div>
            <div class="col-6">
                <label for="date_out">Data de entrega</label>
                <input type="date" class="form-control" id="date_out" name="date_out" placeholder="date_out"
                    value="{{old('date_out')}}">
            </div>
        </div>

    </formulario>
    <span slot="addbutton">
        <button form="formAdicionar" class="btn btn-success">Adicionar</button>
    </span>

</modal>
<modal nome="editar" titulo="Editar">
    <formulario id="formEditar" v-bind:action="'/seams/'+$store.state.item.id" method="put" enctype=""
        token="{{ csrf_token() }}">
        <div class="form-group">
            <label for="product">Produto</label>
            <input type="text" class="form-control" id="product" name="product" placeholder="product"
                v-model="$store.state.item.product">
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="description"
                v-model="$store.state.item.description">
        </div>
        <div class="form-group">
            <label for="price">Valor</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="price"
                v-model="$store.state.item.price">
        </div>
        <div class="form-group">
            <label for="scale">Medida</label>
            <input type="text" class="form-control" id="scale" name="scale" placeholder="scale"
                v-model="$store.state.item.scale">
        </div>
        <div class="form-group">
            <label for="count_clothes">Quantidade</label>
            <input type="number" class="form-control" id="count_clothes" name="count_clothes" placeholder="count_clothes"
                v-model="$store.state.item.count_clothes">
        </div>
        <div class="form-group">
            <label for="paid">Pago</label>
            <input type="checkbox" id="paid" name="paid" placeholder="Pago"
                v-model="$store.state.item.paid">
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <input type="text" class="form-control" id="type" name="type" placeholder="type"
                v-model="$store.state.item.type">
        </div>
        <div class="form-group">
            <label for="date_in">Data de entrada</label>
            <input type="date" class="form-control" id="date_in" name="date_in" placeholder="date_in"
                v-model="$store.state.item.date_in">
        </div>
        <div class="form-group">
            <label for="date_out">Data de entrega</label>
            <input type="date" class="form-control" id="date_out" name="date_out" placeholder="date_out"
                v-model="$store.state.item.date_out">
        </div>



    </formulario>
    <span slot="addbutton">
        <button form="formEditar" class="btn btn-success">Atualizar</button>
    </span>
</modal>
<modal nome="detalhe">
    <card titulo="Detalhes">
        <p> Data entrada: @{{$store.state.item.date_in}}</p>
        <p> Data saida: @{{$store.state.item.date_out}}</p>
        <p> tipo: @{{$store.state.item.type}}</p>
        <p> Pago: @{{$store.state.item.paid}}</p>
        <p> Medidas: @{{$store.state.item.scale}}</p>
        <p> Quantidade: @{{$store.state.item.count_clothes}}</p>

    </card>
</modal>




@endsection




