@extends('layouts.master')

@section('content')

<div class="col-12">
  <div class="card card-dark card-tabs">
    <div class="card-header p-0 pt-1">
      <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="payment-tab" data-toggle="pill" href="#payment" role="tab" aria-controls="payment" aria-selected="true">Histórico de Pagamentos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pending-tab" data-toggle="pill" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pagamentos Pendentes</a>
        </li>

      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade active show" id="payment" role="tabpanel" aria-labelledby="payment-tab">
          <form action="sales" method="get">
            <label>
                Data de pagamento
            <input type="date" name='paid_at' class="form-control" value="{{ request()->input('paid_at') }}">
            </label>
            <button class="btn btn-primary">Buscar</button>
        </form>

        <card cor="bg-dark" titulo="Relatório de Pagamentos">

        <table class="table table-dark table-striped table-hover">
          <thead class="thead-dark ">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Cliente</th>
              <th scope="col">Produto</th>
              <th scope="col">Preço</th>
              <th scope="col">Status</th>
              <th scope="col">Data de Pagamento</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($seams as $seam)
            <tr>
              @if( $seam->paid == true )
              <th scope="row">{{ $seam->id}}</th>
              <td>{{ $seam->customer->name ?? 'Sem cliente' }}</td>
              <td>{{ $seam->product }}</td>
              <td >R$ {{$seam->price}}</td>
              <td >{{$seam->paid == true ? 'Pago' :'pendente' }}</td>
              <td>{{ date('d/m/Y', strtotime($seam->paid_at)) }}</td>
              @endif
            </tr>
              @endforeach

          </tbody>
        </table>
        {{ $seams->appends(request()->all())->links() }}
        </card>

        </div>
        <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
          <form action="sales" method="get">


        <card cor="bg-dark" titulo="Relatório de Pagamentos">

        <table class="table table-dark table-striped table-hover">
          <thead class="thead-dark ">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Cliente</th>
              <th scope="col">Produto</th>
              <th scope="col">Preço</th>
              <th scope="col">Status</th>
              <th scope="col">Ação</th>


            </tr>
          </thead>
          <tbody>
              @foreach ($seams as $seam)
            <tr>
              @if( $seam->paid == false )
              <th scope="row">{{ $seam->id}}</th>
              <td>{{ $seam->customer->name ?? 'Sem cliente' }}</td>
              <td>{{ $seam->product }}</td>
              <td >R$ {{$seam->price}}</td>
              <td >{{$seam->paid == true ? 'Pago' :'pendente' }}</td>
              <td> <button type="button" class="btn bg-success">Pagar</button></td>

              @endif
            </tr>
              @endforeach

          </tbody>
        </table>
        {{ $seams->appends(request()->all())->links() }}
        </card>

        </div>

      </div>
    </div>
    <!-- /.card -->
  </div>
</div>







@endsection
