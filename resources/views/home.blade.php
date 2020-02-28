@extends('layouts.master')

@section('content')
<page tamanho="12" >
    <card >
    <div class="row mb-3">
        <div class="col-6">
            <canvas id="myChart" width="100vx" height="100vx"></canvas>
      </div>
      <div class="col-6">
        <canvas id="ChartValues" width="100px" height="100px"></canvas>
      </div>
    </div>


</card>
</page>


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

 <script type="text/javascript">


var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Pagas', ' A Receber'],
        datasets: [{
            label: '# of Votes',
            data: [ "{{ $data['total_paid'] }}", "{{ $data['total_no_paid'] }}"],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',

            ],
            borderWidth: 1
        }]
    },
    options: {
        title:{
            display:true,
            text:'Quantidade de Costuras ',
            fontSize:25
        },


    }
});

var paid = "{{ $data['value_paid'] + $data['value_no_paid'] }}"



var ctx = document.getElementById('ChartValues').getContext('2d');
Chart.defaults.global.defaultColor='rgba(166, 138, 255, 0.1)';
var ChartValues = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Pagas', ' A Receber', 'Total'],
        datasets: [{
            label: 'Valor das costuras R$',
            data: [ "{{ $data['value_paid'] }}", "{{ $data['value_no_paid']}}", paid ],
            backgroundColor: [

                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(154, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(154, 162, 235, 1)',

            ],
            borderWidth: 1
        }]
    },
    options: {
        legend: false,
        title:{
            display:true,
            text:'Faturamento do Mês ',
            fontSize:25
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }


    }
});
</script>
@endsection
