@extends('layouts.master')

@section('content')


    <h4>Resumo do mês</h4>

    <b>Quantidade de vendas</b>: {{ $data['total'] }}
    <br>
    <b>Quantidade de pedidos pago</b>: {{ $data['total_paid'] }}
    <br>
    <b>Total de pedidos pago</b>: R${{ sprintf(number_format($data['value_paid'], 2, ',','.')) }}
    <br>
    <b>Quantidade de pedidos a receber</b>: {{ $data['total_no_paid'] }}
    <br>
    <b>Total de pedidos a receber</b>: R${{ sprintf(number_format($data['value_no_paid'], 2, ',','.')) }}

    <br>
    <hr>


    <h4>Entregas do dia</h4>
    @if($deliveries->count())
        <ul>
            @foreach($deliveries as $delivery)
                <li>
                    {{ $delivery->product }} - {{ $delivery->description ?: 'Sem descrição' }} - R${{ $delivery->price }}
                </li>
            @endforeach
        </ul>

        <br>
        Total: {{ $data['value_day'] }}
    @else
        <div class="alert alert-primary">
            Não há nenhuma entrega para hoje!
        </div>
    @endif

@endsection

@section('scripts')

@endsection
