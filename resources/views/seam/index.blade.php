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
                    v-bind:itens="{{json_encode($listSeams,true)}}" ordem="desc" ordemcol="1" criar="#criar"
                    detalhe="/seams/"
                    editar="/seams/" deletar="/seams/" token="{{ csrf_token() }}" modal="sim">


        </table-list>
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
                <div class="col-6" style=" ">
                    <label for="customer_id">Clientes</label>
                    <select class="ls-select" name="customer_id" id="nameid">
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
                    <label for="paid">FORMA DE PAGAMENTO</label>
                    <select class="form-control" id="paid" name="paid">
                        <option {{(old('paid') && old('paid') == 'N' ? 'selected' : '' )}} value="1">PAGAR</option>
                        <option
                            {{(old('paid') && old('paid') == 'S' ? 'selected' : ''  )}} {{(!old('type') ? 'selected' : ''  )}} value="0">
                            A RECEBER
                        </option>
                    </select>
                </div>
            </div>
            <div class="row mb-3 ">
                <div class="col-6">
                    <label for="count_clothes">Quantidade de peças</label>
                    <input type="text" class="form-control" id="count_clothes" name="count_clothes"
                           placeholder="count_clothes"
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

            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                       href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                       aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="custom-content-below-profile-tab" data-toggle="pill"
                       href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile"
                       aria-selected="false">Profile</a>
                </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
                <div class="tab-pane fade" id="custom-content-below-home" role="tabpanel"
                     aria-labelledby="custom-content-below-home-tab">
                    <div class="form-group">
                        <label for="product">Produto</label>
                        <input type="text" class="form-control" id="product" name="product" placeholder="product"
                               v-model="$store.state.item.product">
                    </div>

                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <input type="text" class="form-control" id="description" name="description"
                               placeholder="description"
                               v-model="$store.state.item.description">
                    </div>
                    <div class="form-group">
                        <label for="price">Valor</label>
                        <input type="text" class=" money form-control" id="price" name="price" placeholder="price"
                               v-model="$store.state.item.price">
                    </div>
                    <div class="form-group">
                        <label for="scale">Medida</label>
                        <input type="text" class="form-control" id="scale" name="scale" placeholder="scale"
                               v-model="$store.state.item.scale">
                    </div>
                    <div class="form-group">
                        <label for="count_clothes">Quantidade</label>
                        <input type="number" class="form-control" id="count_clothes" name="count_clothes"
                               placeholder="count_clothes"
                               v-model="$store.state.item.count_clothes">
                    </div>
                    <div class="form-group">
                        <label for="paid">FORMA DE PAGAMENTO</label>
                        <select class="form-control" v-model="$store.state.item.paid" id="paid" name="paid">
                            <option {{(old('paid') && old('paid') == 'N' ? 'selected' : '' )}} value="1">PAGAR</option>
                            <option
                                {{(old('paid') && old('paid') == 'S' ? 'selected' : ''  )}} {{(!old('paid') ? 'selected' : ''  )}} value="0">
                                A RECEBER
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">Tipo</label>
                        <input type="text" class="form-control" id="type" name="type" placeholder="type"
                               v-model="$store.state.item.type">
                    </div>
                </div>
                <div class="tab-pane fade active show" id="custom-content-below-profile" role="tabpanel"
                     aria-labelledby="custom-content-below-profile-tab">
                    <div class="form-group">
                        <label for="date_in">Data de entrada</label>
                        <input type="date" class="form-control" id="date_in" name="date_in" placeholder="date_in"
                               v-model="$store.state.item.date_in">
                    </div>
                    <div class="form-group">
                        <label for="date_out">Data de entrega</label>
                        <input type="date" class="form-control" id="date_out" value="{{old('date_out')}}"
                               name="date_out" placeholder="date_out"
                               v-model="$store.state.item.date_out">
                    </div>
                </div>

            </div>


        </formulario>
        <span slot="addbutton">
        <button form="formEditar" class="btn btn-success">Atualizar</button>
    </span>
    </modal>
    <modal titulo="Detalhes" nome="detalhe">

        <div class="card card-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-primary">
                <div class="widget-user-image">
                    <img class="img-circle elevation-2"
                         src="https://image.freepik.com/vector-gratis/iconos-costura_1076-20.jpg" alt="User">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"> Informações Da Costura</h3>


                <h5 class="widget-user-desc">@{{$store.state.item.product}}</h5>
            </div>
            <div class="card-footer p-0">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <p class="ml-2" style="font-size: 18px">
                            Data de Entrada <span class="float-right mr-2 badge bg-primary"> @{{$store.state.item.date_in}}</span>
                        </p>
                    </li>
                    <li class="nav-item">
                        <p class="ml-2" style="font-size: 18px">
                            Data de Saida <span class="float-right mr-2 badge bg-Warning">  @{{$store.state.item.date_out}}</span>
                        </p>
                    </li>
                    <li class="nav-item">
                        <p class="ml-2" style="font-size: 18px">
                            Tipo <span class="float-right mr-2 badge bg-secondary">@{{$store.state.item.type}}</span>
                        </p>
                    </li>
                    <li class="nav-item">
                        <p class="ml-2" style="font-size: 18px">
                            Medidas: <span class="float-right mr-2 badge bg-purple">@{{$store.state.item.scale}}</span>
                        </p>
                    </li>
                    <li class="nav-item">
                        <p class="ml-2" style="font-size: 18px">
                            Quantidade de peças: <span class="float-right mr-2 badge bg-maroon">@{{$store.state.item.count_clothes}}</span>
                        </p>
                    </li>
                    <li class="nav-item">
                        <p class="ml-2" style="font-size: 18px">
                            Valor: <span class="float-right mr-2 badge bg-navy">R$ @{{$store.state.item.price}}</span>
                        </p>
                    </li>
                    <li class="nav-item">
                        <p class="ml-2" style="font-size: 18px">
                            Pagamento: <span class="float-right mr-2"><span v-if="$store.state.item.paid == 1"
                                                                            class="badge bg-success">
            @{{$store.state.item.paid  == 1 ? "Pagamento efetuado" : "A Receber" }}</span>
            <span v-if="$store.state.item.paid == 0" class="badge bg-danger">
                @{{$store.state.item.paid  == 1 ? "Pagamento efetuado" : "A Receber" }}</span>
                             </span>
                        </p>
                    </li>
                </ul>
            </div>
        </div>

    </modal>




@endsection




