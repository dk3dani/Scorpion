@extends('layouts.master')

@section('content')

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
      <th scope="col">Data de Pagamento</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($seams as $seam)
    <tr>

      <th scope="row">{{ $seam->id}}</th>
      <td>{{ $seam->customer->name ?? 'Sem cliente' }}</td>
      <td>{{ $seam->product }}</td>
      <td > R$ {{ number_format($seam->price, 2, ',', '.') }}</td>
      <td>{{ date('d/m/Y', strtotime($seam->paid_at)) }}</td>

    </tr>
      @endforeach

  </tbody>
</table>
{{ $seams->appends(request()->all())->links() }}
</card>



@endsection
