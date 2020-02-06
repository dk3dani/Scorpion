@extends('layouts.master')

@section('content')

<form action="sales" method="get">
    <label>
        Data de pagamento
    <input type="date" name='paid_at' class="form-control" value="{{ request()->input('paid_at') }}">
    </label>
    <button class="btn btn-primary">Buscar</button>
</form>

Lista de Vendas
<hr>
<br>
@foreach ($seams as $seam)
Produto: {{ $seam->product }}
<br>
Preço: {{ $seam->price }}
<br>
Data de pagamento: {{ date('d-m-Y', strtotime($seam->paid_at)) }}
<br>
Cliente: {{ $seam->customer->name ?? 'Sem cliente' }}
<hr>
<br>
@endforeach

{{ $seams->appends(request()->all())->links() }}

@endsection
